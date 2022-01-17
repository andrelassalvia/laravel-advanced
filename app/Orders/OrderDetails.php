<?php

namespace App\Orders;

use App\Billing\PaymentGatewayContract;


class OrderDetails{

  public function __construct(PaymentGatewayContract $paymentGateway)
  {
    $this->paymentGateway = $paymentGateway;
    
  }

  // metodo para retornar todos os detalhes da ordem
  public function all(){

    $this->paymentGateway->setDiscount(500);

    return [
      'name' => 'Victor',
      'address' => '123/coder street' 
    ];
  }



}