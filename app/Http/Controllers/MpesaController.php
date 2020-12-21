<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class MpesaController extends Controller
{
    public function generateAccessToken(){
        $consumer_key= "YNgj2q3V8Azg24bNugTWSQkAA0wMWp8w";
        $consumer_secret="AT4QhgSPneh4sqS3";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }

    public function lipaNaMpesaPassword($passKey,$shortCode)
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = $passKey;
        $BusinessShortCode = $shortCode;
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }

    public function customerMpesaSTKPush(Request $request)
    {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
        $curl_post_data = [
            'BusinessShortCode' => "174379",
            'Password' => $this->lipaNaMpesaPassword("bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919","174379"),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $request->Amount,
            'PartyA' => $request->PhoneNumber, //phone sending the fund
            'PartyB' => "174379",
            'PhoneNumber' => $request->PhoneNumber, //phone sending the fund
            'CallBackURL' => "https://deliveryapp.com/payment",
            'AccountReference' =>"Delivery App",
            'TransactionDesc' => "Delivery App"
        ];
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        return $curl_response;

    }

   
}
