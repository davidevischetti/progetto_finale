<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class , function($app){
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'qjr729rb98f9t7gw',
                'publicKey' => '6fp5j6fqj25mpbb8',
                'privateKey' => '7541ca1ed124cc6ec330e15dd79927ef'
            ]);
        });
    }
}
