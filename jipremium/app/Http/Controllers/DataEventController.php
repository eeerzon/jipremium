<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class DataEventController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // Returns the API response, or null when the call failed or the expected data is missing.
    private function fetchAttendance($url, $body)
    {
        try {
            $response = Http::asForm()->post($url, $body);
        } catch (\Exception $e) {
            Log::error('DataEvent attendance API error: ' . $e->getMessage());
            return null;
        }

        $data = $response->json('data');
        $ok = $response->successful() && is_array($data);
        foreach (['title', 'participant', 'not_present', 'present'] as $key) {
            $ok = $ok && array_key_exists($key, $data);
        }
        foreach (['not_present_list', 'present_list'] as $key) {
            $ok = $ok && is_array($data[$key] ?? null);
        }

        if (! $ok) {
            Log::error('DataEvent attendance API returned no usable data: HTTP ' . $response->status());
            return null;
        }

        return $response;
    }

    public function visitorOnline($id,$idt){
        $url = "https://apismartererp.ayrtonware.com/kreen/kreenapiallyeo_dev/v1/attendance_ticket_detail";

        $body = array(
            'id_merchant' => 'BORGWWEDZPYINQDAW481',
            'id_event' => $id,
            'id_ticket' => $idt,
        );
        
        // try {
        //     $getData = Http::asForm()->post($url, $body);
        //     } catch (\Exception $e) {
        // }
        // If the attendance API is down or answers without data, go back to the list instead of a 500 error.
        $getData = $this->fetchAttendance($url, $body);
        if (! $getData) {
            return redirect('admin/data-event')->with('danger', 'Failed to load event data from the attendance API. Please try again later.');
        }
       
        $totalParticipant =  $getData->json()['data']['participant'];
        $totalNotCheck =  $getData->json()['data']['not_present'];
        $totalCheckIn =  $getData->json()['data']['present'];
		$judul = $getData->json()['data']['title'];

        $data1 = $getData->json()['data']['not_present_list'];
        $items1 = [];
        foreach ($data1 as $item1) {
            $items1[] = [
                'id' => $item1['id'],
                'name' => $item1['name'],
                'email' => $item1['email'],
                'phone' => $item1['phone'],
                'name_ticket' => $item1['name_ticket'],
                'date' => $item1['created_at'],
                'status' => $item1['status'],
            ];
        }

        $data2 = $getData->json()['data']['present_list'];
        $items2 = [];
        foreach ($data2 as $item2) {
            $items2[] = [
                'id' => $item2['id'],
                'name' => $item2['name'],
                'email' => $item2['email'],
                'phone' => $item2['phone'],
                'name_ticket' => $item2['name_ticket'],
                'date' => $item2['created_at'],
                'status' => $item2['status'],
            ];
        }

        return view('backend.data-event.visitor_online', compact('items1', 'items2', 'totalParticipant', 'totalNotCheck', 'totalCheckIn','judul'));
    }

    public function visitorOnsite($id,$idt){
        $url = "https://apismartererp.ayrtonware.com/kreen/kreenapiallyeo_dev/v1/attendance_ticket_detail";

        $body = array(
            'id_merchant' => 'BORGWWEDZPYINQDAW481',
            'id_event' => $id,
            'id_ticket' => $idt,
        );
        
        // try {
        //     $getData = Http::asForm()->post($url, $body);
        //     } catch (\Exception $e) {
        // }
        // If the attendance API is down or answers without data, go back to the list instead of a 500 error.
        $getData = $this->fetchAttendance($url, $body);
        if (! $getData) {
            return redirect('admin/data-event')->with('danger', 'Failed to load event data from the attendance API. Please try again later.');
        }
        $judul = $getData->json()['data']['title'];
        $totalParticipant =  $getData->json()['data']['participant'];
        $totalNotCheck =  $getData->json()['data']['not_present'];
        $totalCheckIn =  $getData->json()['data']['present'];

        $data1 = $getData->json()['data']['not_present_list'];
        $items1 = [];
        foreach ($data1 as $item1) {
            $items1[] = [
                'id' => $item1['id'],
                'name' => $item1['name'],
                'email' => $item1['email'],
                'phone' => $item1['phone'],
                'name_ticket' => $item1['name_ticket'],
                'date' => $item1['created_at'],
                'status' => $item1['status'],
            ];
        }

        $data2 = $getData->json()['data']['present_list'];
        $items2 = [];
        foreach ($data2 as $item2) {
            $items2[] = [
                'id' => $item2['id'],
                'name' => $item2['name'],
                'email' => $item2['email'],
                'phone' => $item2['phone'],
                'name_ticket' => $item2['name_ticket'],
                'date' => $item2['created_at'],
                'status' => $item2['status'],
            ];
        }

        return view('backend.data-event.visitor_onsite', compact('items1', 'items2', 'totalParticipant', 'totalNotCheck', 'totalCheckIn','judul'));
    }

    public function buyerOnline($id,$idt){
        $url = "https://apismartererp.ayrtonware.com/kreen/kreenapiallyeo_dev/v1/attendance_ticket_detail";

        $body = array(
            'id_merchant' => 'BORGWWEDZPYINQDAW481',
            'id_event' => $id,
            'id_ticket' => $idt,
        );

        // try {
        //     $getData = Http::asForm()->post($url, $body);
        //     } catch (\Exception $e) {
        // }
        // If the attendance API is down or answers without data, go back to the list instead of a 500 error.
        $getData = $this->fetchAttendance($url, $body);
        if (! $getData) {
            return redirect('admin/data-event')->with('danger', 'Failed to load event data from the attendance API. Please try again later.');
        }

        $totalParticipant =  $getData->json()['data']['participant'];
        $totalNotCheck =  $getData->json()['data']['not_present'];
        $totalCheckIn =  $getData->json()['data']['present'];
		$judul = $getData->json()['data']['title'];
        $data1 = $getData->json()['data']['not_present_list'];
        $items1 = [];
        foreach ($data1 as $item1) {
            $items1[] = [
                'id' => $item1['id'],
                'name' => $item1['name'],
                'email' => $item1['email'],
                'phone' => $item1['phone'],
                'name_ticket' => $item1['name_ticket'],
                'date' => $item1['created_at'],
                'status' => $item1['status'],
            ];
        }

        $data2 = $getData->json()['data']['present_list'];
        $items2 = [];
        foreach ($data2 as $item2) {
            $items2[] = [
                'id' => $item2['id'],
                'name' => $item2['name'],
                'email' => $item2['email'],
                'phone' => $item2['phone'],
                'name_ticket' => $item2['name_ticket'],
                'date' => $item2['created_at'],
                'status' => $item2['status'],
            ];
        }

        return view('backend.data-event.buyer_online', compact('items1', 'items2', 'totalParticipant', 'totalNotCheck', 'totalCheckIn','judul'));
    }

    public function buyerOnsite($id,$idt){
        $url = "https://apismartererp.ayrtonware.com/kreen/kreenapiallyeo_dev/v1/attendance_ticket_detail";

        $body = array(
            'id_merchant' => 'BORGWWEDZPYINQDAW481',
            'id_event' => $id,
            'id_ticket' => $idt,
        );

        // try {
        //     $getData = Http::asForm()->post($url, $body);
        //     } catch (\Exception $e) {
        // }
        // If the attendance API is down or answers without data, go back to the list instead of a 500 error.
        $getData = $this->fetchAttendance($url, $body);
        if (! $getData) {
            return redirect('admin/data-event')->with('danger', 'Failed to load event data from the attendance API. Please try again later.');
        }
		$judul = $getData->json()['data']['title'];
        $totalParticipant =  $getData->json()['data']['participant'];
        $totalNotCheck =  $getData->json()['data']['not_present'];
        $totalCheckIn =  $getData->json()['data']['present'];

        $data1 = $getData->json()['data']['not_present_list'];
        $items1 = [];
        foreach ($data1 as $item1) {
            $items1[] = [
                'id' => $item1['id'],
                'name' => $item1['name'],
                'email' => $item1['email'],
                'phone' => $item1['phone'],
                'name_ticket' => $item1['name_ticket'],
                'date' => $item1['created_at'],
                'status' => $item1['status'],
            ];
        }

        $data2 = $getData->json()['data']['present_list'];
        $items2 = [];
        foreach ($data2 as $item2) {
            $items2[] = [
                'id' => $item2['id'],
                'name' => $item2['name'],
                'email' => $item2['email'],
                'phone' => $item2['phone'],
                'name_ticket' => $item2['name_ticket'],
                'date' => $item2['created_at'],
                'status' => $item2['status'],
            ];
        }

        return view('backend.data-event.buyer_onsite', compact('items1', 'items2', 'totalParticipant', 'totalNotCheck', 'totalCheckIn','judul'));
    }
}
