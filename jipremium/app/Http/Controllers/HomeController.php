<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.dashboard');
    }

    public function dataEvent(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apismartererp.ayrtonware.com/kreen/kreenapi_dev_up2/v1/order_event_detail2',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('id_order' => '989588275','id_user' => '948'),
            CURLOPT_HTTPHEADER => array(
                'Apikeyuser: ' . config('services.kreen.erp_api_key_user'),
                'Iduser: 948',
                'Authorization: Bearer ' . config('services.kreen.erp_bearer_token')
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response);


        $order = array_column($data->data, 'participant');
        $getDataOrder = json_decode(json_encode($order), true);
        $dataOrder = $getDataOrder[0];

        $payment = array_column($data->data, 'payment_detail');
        $getDataPayment = json_decode(json_encode($payment), true);
        $dataPayment = $getDataPayment[0];

        // $firstName = array_column($datas, 'first_name');
        // $email = array_column($datas, 'email');

        
        $data = $dataOrder;
    
        $results=array();
        foreach($data as $key=>$data){
            $newarr = array();
            
            $newarr['first_name'] = $data['first_name'];
            $newarr['email'] = $data['email'];
            $newarr['ticket'] = $data['name_ticket'];
            // $newarr['quantity'] = $data['qty'];
            // $newarr['prices'] = $data['price'];
            $results[] = $newarr;
        }

        $item = $dataPayment;
    
        $results=array();
        foreach($item as $key=>$data){
            $newarr = array();
            
            $newarr['quantity'] = $data['qty'];
            $newarr['prices'] = $data['price'];
            $results[] = $newarr;
        }
        

        // return view('backend.data-event.list') ->with('results',$results);
    }
}
