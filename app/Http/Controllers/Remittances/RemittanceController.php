<?php

namespace App\Http\Controllers\Remittances;

use App\Contracts\RemittanceGatewayContract;
use App\Http\Controllers\Controller;
use App\Models\Remittances\Remittance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function auth;
use function redirect;
use function view;

class RemittanceController extends Controller
{
    public function index(RemittanceGatewayContract $RemittanceGatewayContract): View
    {
        $user = auth()->user()->id;
        $remittances = Remittance::where('user_id', $user)->paginate(6);
        foreach ($remittances as $remittance)
        {
            if ($remittance->request_id) {
                $RemittanceGatewayContract->queryRemittance($remittance);
            }
        }


        return view('invoices.index', compact('remittances'));
    }

    public function store(Request $request, RemittanceGatewayContract $remittanceGatewayContract): RedirectResponse
    {
        $shoppingCart = \Cart::getContent();

        $data = $remittanceGatewayContract->createSession($shoppingCart, $request);
//        dd($data->response);
        return $data->payment->status == 'pending'
            ? redirect($data->response->processUrl()): redirect()->route('catalogo');
    }

    public function show($id): View
    {
        $products = \Cart::getContent();
        $remittance = Remittance::find($id);
        return view('invoices.show',compact('remittance','products'));
    }

    public function update(Request $request, $id): void
    {
        //
    }
}
