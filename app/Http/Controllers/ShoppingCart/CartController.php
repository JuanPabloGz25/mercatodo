<?php

namespace App\Http\Controllers\ShoppingCart;

use App\Http\Controllers\Controller;
use App\Models\Products\Products;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function redirect;
use function session;
use function view;

class CartController extends Controller
{
    public function cartList(): View
    {
        $products = \Cart::getContent();
//        dd($products);
        return view('cart', compact('products'));
    }


    public function addToCart(Request $request): RedirectResponse
    {
//        dd($request->toArray());

        $product = Products::whereId($request->product_id)->firstOrFail();
//        dd($product->toArray());
        \Cart::add([
            'id' => $product->id,
            'name' => $product->full_description,
            'price' => (float)$product->price,
            'quantity' => 1,
            'associatedModel' => $product,
            'attributes' => array(
                'image' => $product->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('catalogo');
    }

    public function updateCart(Request $request): RedirectResponse
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity,
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request): RedirectResponse
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart(): RedirectResponse
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
