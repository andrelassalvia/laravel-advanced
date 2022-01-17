<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;

class PayOrderController extends Controller
{
    public function store(PaymentGatewayContract $paymentGateway, OrderDetails $orderDetails ){

        $order = $orderDetails->all(); 

        dd($paymentGateway->charge(2500));

    }
}
