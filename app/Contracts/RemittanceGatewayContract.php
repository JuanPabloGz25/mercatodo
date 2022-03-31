<?php

namespace App\Contracts;

use App\Models\Remittances\Remittance;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface RemittanceGatewayContract
{
    public function connection(array $settings): self;
    public function queryRemittance(Remittance $remittance):Remittance;
    public function createSession(Collection $shoppingCart, Request $request): object;
}
