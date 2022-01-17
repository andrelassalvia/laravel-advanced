<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use Illuminate\Support\ServiceProvider;
use App\Billing\PaymentGatewayContract;
use App\Billing\CreditCardPaymentGateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Registrar os parametros de BankPaymentGateway
        $this->app->singleton(PaymentGatewayContract::class, function($app){

            if(request()->has('credit')){
                
                return new CreditCardPaymentGateway('usd');
            }

            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
