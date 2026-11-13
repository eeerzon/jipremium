<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderCheckController extends Controller
{
    public function checkQrcode(Request $request)
    {
        $request->validate([
            'id_order' => 'required|string',
        	'id_event' => 'nullable|string',
        ]);

        $idOrder = $request->input('id_order');
    	$idEvent = $request->input('id_event');

        try {
            $query = DB::table('buyer_registrations')
                ->where('id_order', $idOrder);
            
            if (!empty($idEvent)) {
                $query->where('id_event', $idEvent);
            }

            $order = $query->first();

            if (!$order) {
                return response()->json([
                	'rc' => 404,
                    'success' => false,
                    'message' => 'Order not found',
                ], 404);
            }

            $fullname = trim(($order->first_name ?? '') . ' ' . ($order->last_name ?? ''));

            return response()->json([
            	'rc' => 200,
                'success' => true,
                'message' => 'Data ditemukan',
                'data'    => [
                    'id'      => $order->id_order,
                	'id_event' => $order->id_event,
                    'show_qr' => "1", // string, samain format sama endpoint booking_redeem3_coex_kiosk
                    'detail'  => [
                        'fullname'    => $fullname,
                        'email'       => $order->email,
                        'order_forms' => $order->data_addform, // kosong, tidak ada tabel form terpisah untuk order_details
                    ],
                ],
            ], 200);

        } catch (\Throwable $e) {
            Log::error('checkQrcode error: ' . $e->getMessage());

            return response()->json([
            	'rc' => 500,
                'success' => false,
                'message' => 'Terjadi kesalahan pada server',
                'data'    => null,
            ], 500);
        }
    }
}