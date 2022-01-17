<?php

namespace App\Billing;

use App\Billing\PaymentGatewayContract;
use Illuminate\Support\Str;



class CreditCardPaymentGateway implements PaymentGatewayContract
{
  private $currency;
  private $discount;

  public function __construct($currency){

    $this->currency = $currency;
    $this->discount = 0;

  }

  public function setDiscount($amount){
 
    return $this->discount = $amount;
  }

 // For several different payments systems in one apllication
  public function charge($amount){

    // charge the bank

    $fees = $amount * 0.03;

    return [
      'amount' => $amount - $this->discount + $fees,
      'confirmation_number' => Str::random(),
      'currency' => $this->currency,
      'discount' => $this->discount,
      'fees' => $fees 

    ];
  }


}
