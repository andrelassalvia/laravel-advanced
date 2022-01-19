<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use Illuminate\Support\ServiceProvider;
use App\Billing\PaymentGatewayContract;
use App\Billing\CreditCardPaymentGateway;
use Illuminate\Support\Facades\View;
use App\Models\Channel;
use App\Http\Views\Composers\ChannelsComposer;
use App\PostCardSendingService;

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
        // option 1 - every single view
        // View::share('channels', Channel::orderBy('name')->get());

        // option 2 - composer view - somente as views elencadas recebem os dados de 'channels'
        // View::composer(['post.create', 'channel.index'], function($view){

        //     $view->with('channels', Channel::orderBy('name')->get());

        // });

        // option 3 - Dedicated class
        View::composer('partials.*', ChannelsComposer::class);

        // facades
        $this->app->singleton('Postcard', function($app){
            return new PostCardSendingService('US', 4, 6);
        });
    }


}
