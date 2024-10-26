<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    function razorePay()
    {
        return view('razorpay.pay');
    }
    function razorePaycheckout(Request $request)
    {
        $api = new Api(Config("values.razorpayKey"), Config("values.razorpaySecret"));
        $orderData  = $api->order->create([
            'receipt' => '111',
            'amount' => $request->amount * 100,
            'currency' => 'INR'
        ]); // Creates Razorpay order

        $data = [
            "key"               => Config("values.razorpayKey"),
            "amount"            => $request->amount * 100,
            "order_id"          => $orderData['id'],
        ];
        return response()->json($data, 200);
    }
}
