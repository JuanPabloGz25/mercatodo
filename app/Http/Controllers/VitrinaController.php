<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\View\View;

class VitrinaController extends Controller
{
    public function vitrina (Request $request): View
    {
        $products = Products::where('marca', 'LIKE', '%' . $request->input('search') . '%')
            ->where('status','enable')->paginate(6)->withQueryString();

        return view('vitrina.index',compact('products'));
    }
}
