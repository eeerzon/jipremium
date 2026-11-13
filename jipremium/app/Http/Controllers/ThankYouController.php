<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\BuyerRegistration;
use App\order_detail;
class ThankYouController extends Controller
{
    public function show($id_order)
    {
        $orderDetails = order_detail::where('id_order', $id_order)->get();
        
        return view('frontend.thank_you', ['orderDetails' => $orderDetails]);
    }
}
