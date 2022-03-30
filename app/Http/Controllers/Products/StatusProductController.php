<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Products\Products;
use Illuminate\Http\RedirectResponse;
use function redirect;

class StatusProductController extends Controller
{

    public function update($id): RedirectResponse
    {
        $product = Products::find($id);

        if ($product->status == 'enable'){
            $product->status = 'disable';
        }else{
            $product->status = 'enable';
        }
        $product->save();
        return redirect()->route('products.index');
    }
}
