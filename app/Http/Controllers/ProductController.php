<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-product|create-product|edit-product|borrar-product')->only('index');
         $this->middleware('permission:crear-product', ['only' => ['create','store']]);
         $this->middleware('permission:editar-product', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-product', ['only' => ['destroy']]);
    }
    
    public function index(): View
    {
         $currency = config('app.currency');       
         $products = Products::paginate(5);
         return view('products.index',compact('products','currency'));   
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $products = $request->all();
        if($image = $request->file('image')) {
            $routeSaveImg = 'image/';
            $imageProduct = date('YmdHis'). "." . $image->getClientOriginalExtension();
            $image->move($routeSaveImg, $imageProduct);
            $products['image'] = "$imageProduct";
        }
        
        Products::create($products);
        return redirect()->route('products.index');
   }

    public function show($id)
    {
        
    }

    public function edit(Products $products): View
    {
        return view('products.edit', compact('products'));
    }

    public function update(UpdateProductRequest $request, Products $products): RedirectResponse
    {
        
        $prod = $request->all();
         if($image = $request->file('image')){
            $rutaGuardarImg = 'image/';
            $imageProducto = date('YmdHis') . "." . $image->getClientOriginalExtension(); 
            $image->move($rutaGuardarImg, $imagenProducto);
            $prod['image'] = "$imagenProducto";
         }else{
            unset($prod['image']);
         }
         $products->update($prod);
         return redirect()->route('products.index');
    }

    public function destroy($id): RedirectResponse
    {
        Products::find($id)->delete();
    
        return redirect()->route('products.index');
    }
}