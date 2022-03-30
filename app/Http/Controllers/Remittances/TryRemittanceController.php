<?php

namespace App\Http\Controllers\Remittances;

use App\Contracts\RemittanceGatewayContract;
use App\Http\Controllers\Controller;
use App\Models\Remittances\Remittance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function redirect;

class TryRemittanceController extends Controller
{
    public function store (Request $request, RemittanceGatewayContract $remittanceGatewayContract, Remittance $remittance): RedirectResponse
    {
        $idCar = $remittance->shopping_car_id;
        $shoppingCart= \Cart::getContent($idCar);
        $remittance = $remittanceGatewayContract->createSession($shoppingCart, $request);

        return redirect($remittance->response->processUrl());
    }
}
