<?php

namespace App;
use SoapClient;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    private $MerchantID;
    private $Amount;
    private $Description;
    private $CallbackURL;

    public function __construct($amount, $orderId = null){

      $this->MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX'; //Required
      $this->Amount = $amount; //Amount will be based on Toman - Required
      $this->Description = 'پرداخت وجه بابت دریافت کالا'; // Required
      $this->CallbackURL = 'http://shop.test:10/payment-verify/'.$orderId; // Required

    }

    public function doPayment(){
      $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

      $result = $client->PaymentRequest(
        [
          'MerchantID' => $this->MerchantID,
          'Amount' => $this->Amount,
          'Description' => $this->Description,
          'CallbackURL' => $this->CallbackURL
        ]
      );
      return $result;
    }

    public function verifyPayment($authority, $status)
    {
      if ($status == 'OK') {

        $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentVerification(
          [
            'MerchantID' => $this->MerchantID,
            'Authority' => $authority,
            'Amount' => $this->Amount,
          ]
        );
        return $result;
      }else{
        return false;
      }
    }

    public function order()
    {
      return $this->hasOne(Order::class);
    }
}
