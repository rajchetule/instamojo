<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\services\PayUservice\Exception;
use Instamojo\Instamojo;
use App\Payment;

class PayController extends Controller
{

    public function __construct() {

   }
    public function index()
   {
        return view('event');
   }

   public function pay(Request $request){


            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER,
                        array("X-Api-Key:test_32c6266e9b6a867901a56d2b348",
                            "X-Auth-Token:test_1efe5d9dee7b23a28f327a768f8"));
            $payload = Array(
                'purpose' => 'FIFA 16',
                'amount' =>  $request->amount,
                'phone' =>  $request->mobile,
                'buyer_name' =>  $request->name,
                'redirect_url' => 'http://127.0.0.1:8000/pay-success',
                'send_email' => true,
                // 'webhook' => 'http://127.0.0.1:8000/webhook/',
                'send_sms' => true,
                'email' => $request->email,
                'allow_repeated_payments' => false
            );
            // dd($payload);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            // dd($response);
            curl_close($ch);

            echo $response;
            $response = json_decode($response);
            // dd($response->payment_request->longurl);
            return redirect($response->payment_request->longurl);

    }
    public function success(Request $request)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_32c6266e9b6a867901a56d2b348",
                "X-Auth-Token:test_1efe5d9dee7b23a28f327a768f8"));

        $response = curl_exec($ch);
        curl_close($ch);

        echo $response;

        // $response = json_decode($response);
        // return view('success', compact('response'));
    }


}
