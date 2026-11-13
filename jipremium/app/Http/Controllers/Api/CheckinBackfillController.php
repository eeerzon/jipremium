<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CheckinBackfillController extends Controller
{
    // ============================
    // KONSTANTA (SEMUA SUDAH FIX, TIDAK PERLU INPUT MANUAL)
    // ============================
    private const FIXED_DATE_EVENT  = '2026-09-03';
    private const FIXED_ID_MERCHANT = 'BORGWWEDZPYINQDAW481';
    private const FIXED_SCAN_DATE   = '2026-09-04 08:15:00';
    private const FIXED_TYPE_SCAN   = 'checkin';
    // PENTING: kolom `platform` bertipe ENUM dengan daftar nilai terbatas.
    // Cek nilai valid via: SHOW COLUMNS FROM tbl_event_log_scan LIKE 'platform';
    private const FIXED_PLATFORM    = 'inject';

    // Filter tambahan: form pertanyaan hari kehadiran, hanya yang jawab "Day 1"
    private const FIXED_ID_ORDER_FORM_MASTER = 'AYHCMCSDWTZSTFXKP146';
    private const FIXED_ANSWER_LIKE          = '%Day 1%';

    // Nama koneksi DB event (beda dari koneksi default sistem),
    // didaftarkan di config/database.php
    private const DB_CONNECTION = 'event_db';

    // Ukuran chunk per transaction - dibuat kecil supaya lock ke tabel live
    // tidak ditahan lama; setiap chunk commit sendiri sebelum lanjut ke chunk berikutnya.
    private const CHUNK_SIZE = 100;

    /**
     * Fetch order yang belum check-in (> 1 tiket per order),
     * lalu langsung auto-insert ke tbl_event_log_scan.
     * Tidak butuh input apa pun dari request.
     *
     * POST /api/checkin-backfill/run
     */
    public function run(): JsonResponse
    {
        // ============================
        // STEP 1 - FETCH DATA
        // (window function -> tetap pakai raw query)
        // ============================
        $rows = DB::connection(self::DB_CONNECTION)->select("
            SELECT *
            FROM (
                SELECT 
                    o.id            AS id_order,
                    o.id_event,
                    o.invoice_number,
                    o.first_name    AS order_first_name,
                    o.last_name     AS order_last_name,
                    o.email         AS order_email,
                    o.phone         AS order_phone,
                    o.date_event,
                    d.id            AS id_order_detail,
                    d.id_event_ticket,
                    d.first_name    AS peserta_first_name,
                    d.last_name     AS peserta_last_name,
                    d.email         AS peserta_email,
                    d.phone         AS peserta_phone,
                    d.status        AS status_detail,
                    o.created_at,
                    fa.answer       AS jawaban_hari,
                    COUNT(d.id) OVER (PARTITION BY o.id) AS total_tiket_per_order
                FROM tbl_event_order o
                INNER JOIN tbl_event_order_detail d 
                    ON d.id_order = o.id
                LEFT JOIN tbl_event_log_scan s 
                    ON s.id_order_detail = d.id
                    AND s.type_scan = :type_scan
                INNER JOIN tbl_event_order_form_answer fa
                    ON fa.id_order_detail = d.id
                    AND fa.id_order = o.id
                    AND fa.id_order_form_master = :id_order_form_master
                    AND fa.answer LIKE :answer_like
                WHERE o.date_event = :date_event
                    AND o.status = '1'      
                    AND d.status = '1'      
                    AND s.id IS NULL       
            ) x
            WHERE x.total_tiket_per_order > 1
            ORDER BY x.created_at ASC, x.id_order ASC
        ", [
            'type_scan'            => self::FIXED_TYPE_SCAN,
            'date_event'           => self::FIXED_DATE_EVENT,
            'id_order_form_master' => self::FIXED_ID_ORDER_FORM_MASTER,
            'answer_like'          => self::FIXED_ANSWER_LIKE,
        ]);

        if (empty($rows)) {
            return response()->json([
                'success'        => true,
                'message'        => 'Tidak ada data yang perlu di-backfill.',
                'total_fetched'  => 0,
                'fetched_data'   => [],
                'total_inserted' => 0,
                'inserted'       => [],
                'total_skipped'  => 0,
                'skipped'        => [],
            ]);
        }

        // ============================
        // STEP 2 - AUTO INSERT (PER-CHUNK, TRANSACTION PENDEK)
        // ============================
        // Catatan: pendekatan ini butuh UNIQUE KEY di DB pada
        // (id_order_detail, type_scan) di tbl_event_log_scan, contoh:
        //   ALTER TABLE tbl_event_log_scan
        //   ADD UNIQUE KEY uniq_order_detail_type (id_order_detail, type_scan);
        // Dengan unique key ini, insertOrIgnore otomatis skip baris duplikat
        // di level database - tidak perlu SELECT ... FOR UPDATE manual per baris.
        //
        // PENTING: setiap chunk punya transaction SENDIRI (bukan 1 transaction
        // besar untuk semua 625 baris). Ini supaya lock ke tabel live
        // (tbl_event_log_scan & tbl_event_order_detail) dilepas bertahap per
        // chunk, tidak menahan tabel selama puluhan menit sekaligus - penting
        // karena tabel ini sedang dipakai live oleh sistem checkin asli.

        $totalInsertedCount = 0;
        $chunkErrors = [];

        foreach (array_chunk($rows, self::CHUNK_SIZE) as $chunkIndex => $rowsChunk) {
            $insertPayload = [];
            $orderDetailIds = [];

            foreach ($rowsChunk as $row) {
                $insertPayload[] = [
                    'id'              => $this->generateScanId(),
                    'id_merchant'     => self::FIXED_ID_MERCHANT,
                    'id_event'        => $row->id_event,
                    'id_order_detail' => $row->id_order_detail,
                    'type_scan'       => self::FIXED_TYPE_SCAN,
                    'scan_date'       => self::FIXED_SCAN_DATE,
                    'user_input'      => null,
                    'platform'        => self::FIXED_PLATFORM,
                ];
                $orderDetailIds[] = $row->id_order_detail;
            }

            try {
                DB::connection(self::DB_CONNECTION)->transaction(function () use (
                    $insertPayload,
                    $orderDetailIds,
                    &$totalInsertedCount
                ) {
                    $totalInsertedCount += DB::connection(self::DB_CONNECTION)
                        ->table('tbl_event_log_scan')
                        ->insertOrIgnore($insertPayload);

                    DB::connection(self::DB_CONNECTION)
                        ->table('tbl_event_order_detail')
                        ->whereIn('id', $orderDetailIds)
                        ->update(['flag_present' => 1]);
                });
            } catch (\Throwable $e) {
                // Chunk ini gagal - dicatat, lanjut ke chunk berikutnya
                // (chunk lain yang sudah commit sebelumnya tetap tersimpan,
                // tidak ikut rollback semua seperti transaction besar).
                $chunkErrors[] = [
                    'chunk_index' => $chunkIndex,
                    'error'       => $e->getMessage(),
                ];
            }
        }

        if (!empty($chunkErrors) && $totalInsertedCount === 0) {
            return response()->json([
                'success'       => false,
                'message'       => 'Semua chunk gagal diproses.',
                'chunk_errors'  => $chunkErrors,
                'fetched_data'  => $rows,
                'total_fetched' => count($rows),
            ], 500);
        }

        $totalSkippedCount = count($rows) - $totalInsertedCount;

        return response()->json([
            'success'        => empty($chunkErrors),
            'message'        => empty($chunkErrors)
                ? 'Fetch & insert checkin backfill berhasil dijalankan otomatis.'
                : 'Sebagian chunk berhasil, sebagian gagal - cek chunk_errors.',
            'params_used'    => [
                'date_event'            => self::FIXED_DATE_EVENT,
                'id_merchant'           => self::FIXED_ID_MERCHANT,
                'scan_date'             => self::FIXED_SCAN_DATE,
                'type_scan'             => self::FIXED_TYPE_SCAN,
                'platform'              => self::FIXED_PLATFORM,
                'id_order_form_master'  => self::FIXED_ID_ORDER_FORM_MASTER,
                'answer_filter'         => self::FIXED_ANSWER_LIKE,
            ],
            'total_fetched'  => count($rows),
            'fetched_data'   => $rows,
            'total_inserted' => $totalInsertedCount,
            'total_skipped'  => $totalSkippedCount,
            'chunk_errors'   => $chunkErrors,
            'note'           => 'Baris skipped = sudah ada log checkin sebelumnya (dicegah otomatis via unique key di DB). Setiap ' . self::CHUNK_SIZE . ' baris diproses & commit dalam transaction terpisah untuk menghindari lock lama di tabel live.',
        ]);
    }

    /**
     * Update flag_present = 1 di tbl_event_order_detail untuk semua
     * id_order_detail yang SUDAH ADA di tbl_event_log_scan (type_scan = checkin)
     * tapi flag_present-nya belum ke-update (misal dari proses backfill lama
     * yang sempat gagal di tengah jalan).
     *
     * Tidak melakukan INSERT apa pun ke tbl_event_log_scan - murni sinkronisasi
     * flag_present berdasarkan data log scan yang sudah ada.
     *
     * Diproses per-chunk dengan keyset pagination (bukan OFFSET) supaya tetap
     * ringan untuk tabel besar/live, dan tiap chunk commit dalam transaction
     * pendek sendiri-sendiri.
     *
     * POST /api/checkin-backfill/fix-flag-present
     */
    public function fixFlagPresent(): JsonResponse
    {
        $totalUpdated = 0;
        $lastId       = null;
        $loopGuard    = 0;
        $maxLoops     = 5000; // safety net, cegah infinite loop kalau ada bug

        do {
            $loopGuard++;
            if ($loopGuard > $maxLoops) {
                break;
            }

            $query = DB::connection(self::DB_CONNECTION)
                ->table('tbl_event_order_detail as d')
                ->join('tbl_event_log_scan as s', function ($join) {
                    $join->on('s.id_order_detail', '=', 'd.id')
                         ->where('s.type_scan', '=', self::FIXED_TYPE_SCAN);
                })
                ->where(function ($q) {
                    $q->where('d.flag_present', '!=', 1)
                      ->orWhereNull('d.flag_present');
                })
                ->select('d.id')
                ->distinct()
                ->orderBy('d.id')
                ->limit(self::CHUNK_SIZE);

            if ($lastId !== null) {
                $query->where('d.id', '>', $lastId);
            }

            $ids = $query->pluck('id')->toArray();

            if (empty($ids)) {
                break;
            }

            DB::connection(self::DB_CONNECTION)->transaction(function () use ($ids, &$totalUpdated) {
                $totalUpdated += DB::connection(self::DB_CONNECTION)
                    ->table('tbl_event_order_detail')
                    ->whereIn('id', $ids)
                    ->update(['flag_present' => 1]);
            });

            $lastId = end($ids);
        } while (count($ids) === self::CHUNK_SIZE);

        return response()->json([
            'success'          => true,
            'message'          => 'Sinkronisasi flag_present selesai.',
            'total_updated'    => $totalUpdated,
            'chunk_size'       => self::CHUNK_SIZE,
            'note'             => 'Hanya update flag_present berdasarkan id_order_detail yang sudah ada di tbl_event_log_scan (type_scan=checkin). Tidak ada insert baru ke tbl_event_log_scan.',
        ]);
    }

    /**
     * Generate ID unik, mengikuti pola string numerik panjang
     * (contoh existing: 39817353914947872452)
     */
    private function generateScanId(): string
    {
        $microtime = str_replace('.', '', (string) microtime(true));
        $random    = str_pad((string) random_int(0, 9999999999), 10, '0', STR_PAD_LEFT);
        return substr($microtime . $random, 0, 20);
    }
}