<?php

namespace App\RemittanceGateway;

use App\Contracts\RemittanceGatewayContract;
use App\Exceptions\GatewayException;
use App\Models\Remittances\Remittance;
use Carbon\Carbon;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Throwable;

class PlaceToPayGateway implements RemittanceGatewayContract
{
    protected PlacetoPay $placetopay;

    public function connection(array $settings): self
    {
        $this->placetopay = new PlacetoPay([
            'login' => Arr::get($settings,'login'),
            'tranKey' => Arr::get($settings, 'tranKey'),
            'baseUrl' => Arr::get($settings, 'baseUrl'),
            'timeout' => 10,
        ]);
        return $this;
    }

    public function queryRemittance(Remittance $remittance): Remittance
    {
        $response = $this->placetopay->query($remittance->request_id);

        try {
            if ($response->isSuccessful()){
                if ($response->status()->isApproved()){
                    $remittance->status = 'successful';
                    $remittance->payment_date = new Carbon($response->status()->date());
                }elseif ($response->status()->isRejected()){
                    $remittance->status = 'rejected';
                }
                $remittance->save();
            }
        }
        catch (Throwable $exception)
        {
            report($exception);
            throw new GatewayException($exception->getMessage());
        }
        return $remittance;
    }

    public function createSession(Collection $shoppingCart, Request $request): object
    {
        $totalPrice = 0;
        foreach ($shoppingCart as $product){
//            dd($product->price);
            $priceProduct = $product->price;
            $productQuantity = $product->quantity;
            $totalPrice += $priceProduct * $productQuantity;
        }

        try {
            $remittance = new Remittance();
            $remittance->cart_id = auth()->user()->id;
            $remittance->reference = Str::random(10);
            $remittance->status = 'pending';
            $remittance->user_id = auth()->user()->id;
            $remittance->total = $totalPrice;
            $remittance->document = auth()->user()->document;
            $remittance->save();
            $request = [
                'payment' => [
                    'reference' => $remittance->reference,
                    'description' => $remittance->description,
                    'amount' => [
                        'currency' => 'COP',
                        'total' => $remittance->total,
                    ],

                ],
                'payer' => [
                    'document' => $remittance->user->document,
                    'documentType' => 'CC',
                    'name' => $remittance->user->name,
                    'surname' => $remittance->user->lastname,
                    'email' => $remittance->user->email,
                    'mobile' => $remittance->user->phone,
                ],
                'expiration' => date('c',strtotime('+30 minutes')),
                'returnUrl' => route('catalogo', $remittance),
                'ipAddress' => $request->ip(),
                'userAgent' => $request->userAgent(),
            ];
            $response = $this->placetopay->request($request);
            if ($response->isSuccessful()){
                $remittance->request_id = $response->requestId();
                $remittance->status = 'pending';
                $remittance->save();
            } else {
                $remittance->status = 'rejected';
                $remittance->save();
            }

            return (object)[
                'payment' => $remittance,
                'response' => $response,
            ];
        }catch (Throwable $exception){
            report($exception);
            throw new GatewayException($exception->getMessage());
        }
    }
}
