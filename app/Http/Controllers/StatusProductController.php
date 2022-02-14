<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Products;

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
