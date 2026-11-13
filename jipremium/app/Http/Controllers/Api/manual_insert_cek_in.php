<?php
/**
 * insert_checkin_backfill.php
 *
 * Alur otomatis (tanpa input manual):
 *   1. Jalankan query SELECT untuk ambil order yang belum check-in
 *      & punya > 1 tiket per order (query persis dari kebutuhan user).
 *   2. Langsung insert hasilnya ke tbl_event_log_scan dengan
 *      id_merchant & scan_date yang sudah di-fix.
 *
 * Cara pakai: cukup diakses/dijalankan (GET atau CLI), tanpa body/param.
 *   php insert_checkin_backfill.php
 *   atau akses via browser/HTTP GET ke file ini.
 */

declare(strict_types=1);
header('Content-Type: application/json');

// ============================
// 1. KONFIGURASI DATABASE
// ============================
$DB_HOST = 'kreenconnect.com';
$DB_NAME = 'kreen_staging_online';
$DB_USER = 'dbangga';
$DB_PASS = '$DbKr33n#2026';

// ============================
// 2. KONSTANTA (SEMUA SUDAH FIX, TIDAK PERLU INPUT MANUAL)
// ============================
const FIXED_DATE_EVENT  = '2026-09-03';
const FIXED_ID_MERCHANT = 'BORGWWEDZPYINQDAW481';
const FIXED_SCAN_DATE   = '2026-09-04 08:15:00';
const FIXED_TYPE_SCAN   = 'checkin';
const FIXED_PLATFORM    = 'manual';

// ============================
// 3. KONEKSI DATABASE (PDO)
// ============================
try {
    $pdo = new PDO(
        "mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4",
        $DB_USER,
        $DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Koneksi database gagal',
        'error'   => $e->getMessage(),
    ]);
    exit;
}

// ============================
// 4. STEP 1 - FETCH DATA (query persis dari kebutuhan)
// ============================
$selectSql = "
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
            COUNT(d.id) OVER (PARTITION BY o.id) AS total_tiket_per_order
        FROM tbl_event_order o
        INNER JOIN tbl_event_order_detail d 
            ON d.id_order = o.id
        LEFT JOIN tbl_event_log_scan s 
            ON s.id_order_detail = d.id
            AND s.type_scan = :type_scan
        WHERE o.date_event = :date_event
            AND o.status = '1'      
            AND d.status = '1'      
            AND s.id IS NULL       
    ) x
    WHERE x.total_tiket_per_order > 1
    ORDER BY x.created_at ASC, x.id_order ASC
";

$selectStmt = $pdo->prepare($selectSql);
$selectStmt->execute([
    ':type_scan'  => FIXED_TYPE_SCAN,
    ':date_event' => FIXED_DATE_EVENT,
]);
$rows = $selectStmt->fetchAll();

// Kalau tidak ada data, langsung berhenti di sini
if (empty($rows)) {
    echo json_encode([
        'success'      => true,
        'message'      => 'Tidak ada data yang perlu di-backfill.',
        'fetched_data' => [],
        'total_fetched' => 0,
        'inserted'     => [],
        'total_inserted' => 0,
    ]);
    exit;
}

// ============================
// 5. GENERATE ID UNIK
//    (mengikuti pola: string numerik panjang, contoh: 39817353914947872452)
// ============================
function generateScanId(): string
{
    $microtime = str_replace('.', '', microtime(true));
    $random    = str_pad((string) random_int(0, 9999999999), 10, '0', STR_PAD_LEFT);
    return substr($microtime . $random, 0, 20);
}

// ============================
// 6. STEP 2 - AUTO INSERT KE tbl_event_log_scan (TRANSACTION + PROTEKSI DUPLIKAT)
// ============================

// Cek existing log untuk id_order_detail ini (di-lock via FOR UPDATE
// supaya aman dari race condition kalau script ke-trigger 2x bersamaan)
$checkSql = "
    SELECT id 
    FROM tbl_event_log_scan 
    WHERE id_order_detail = :id_order_detail 
        AND type_scan = :type_scan
    FOR UPDATE
";
$checkStmt = $pdo->prepare($checkSql);

$insertSql = "
    INSERT INTO tbl_event_log_scan
        (id, id_merchant, id_event, id_order_detail, type_scan, scan_date, user_input, platform)
    VALUES
        (:id, :id_merchant, :id_event, :id_order_detail, :type_scan, :scan_date, :user_input, :platform)
";
$insertStmt = $pdo->prepare($insertSql);

$inserted = [];
$skipped  = [];

$pdo->beginTransaction();
try {
    foreach ($rows as $row) {
        // Proteksi utama: cek dulu apakah id_order_detail ini
        // sudah punya log scan (type checkin), skip kalau sudah ada.
        $checkStmt->execute([
            ':id_order_detail' => $row['id_order_detail'],
            ':type_scan'       => FIXED_TYPE_SCAN,
        ]);
        $existing = $checkStmt->fetch();

        if ($existing) {
            $skipped[] = [
                'id_order_detail'   => $row['id_order_detail'],
                'id_event_ticket'   => $row['id_event_ticket'],
                'existing_log_id'   => $existing['id'],
                'reason'            => 'Sudah ada log checkin untuk id_order_detail ini',
            ];
            continue;
        }

        $newId = generateScanId();

        $insertStmt->execute([
            ':id'              => $newId,
            ':id_merchant'     => FIXED_ID_MERCHANT,
            ':id_event'        => $row['id_event'],
            ':id_order_detail' => $row['id_order_detail'],
            ':type_scan'       => FIXED_TYPE_SCAN,
            ':scan_date'       => FIXED_SCAN_DATE,
            ':user_input'      => null,
            ':platform'        => FIXED_PLATFORM,
        ]);

        $inserted[] = [
            'id'                 => $newId,
            'id_order'           => $row['id_order'],
            'id_order_detail'    => $row['id_order_detail'],
            'id_event'           => $row['id_event'],
            'id_event_ticket'    => $row['id_event_ticket'],
            'peserta_first_name' => $row['peserta_first_name'],
            'peserta_email'      => $row['peserta_email'],
        ];
    }

    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo json_encode([
        'success'      => false,
        'message'      => 'Insert gagal, transaksi di-rollback. Data belum tersimpan.',
        'error'        => $e->getMessage(),
        'fetched_data' => $rows,
        'total_fetched' => count($rows),
    ]);
    exit;
}

// ============================
// 7. RESPONSE FINAL (fetch + insert result)
// ============================
echo json_encode([
    'success'        => true,
    'message'        => 'Fetch & insert checkin backfill berhasil dijalankan otomatis.',
    'params_used'    => [
        'date_event'  => FIXED_DATE_EVENT,
        'id_merchant' => FIXED_ID_MERCHANT,
        'scan_date'   => FIXED_SCAN_DATE,
        'type_scan'   => FIXED_TYPE_SCAN,
        'platform'    => FIXED_PLATFORM,
    ],
    'total_fetched'  => count($rows),
    'fetched_data'   => $rows,
    'total_inserted' => count($inserted),
    'inserted'       => $inserted,
    'total_skipped'  => count($skipped),
    'skipped'        => $skipped,
]);