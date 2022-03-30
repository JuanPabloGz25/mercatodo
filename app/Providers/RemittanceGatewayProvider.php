<?php

namespace App\Providers;

use App\Contracts\RemittanceGatewayContract;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class RemittanceGatewayProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(RemittanceGatewayContract::class, function(){
            $service = config('remittancegateway.services.current');
            $remittancegateway = config('remittancegateway.services.'.$service);
            $remittancegatewayClass = Arr::get($remittancegateway,'class');
            return (new $remittancegatewayClass())->connection(Arr::get($remittancegateway, 'settings'));
        });
    }
}
