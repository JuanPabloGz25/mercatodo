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
         $exchange = config('app.exchange');
         $products = Products::paginate(5);
         return view('products.index',compact('products','exchange'));
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

    public function edit(Products $product): View
    {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Products $product): RedirectResponse
    {
        $product = $request->all();
         if($image = $request->file('image')){
            $rutaGuardarImg = 'image/';
            $imageProduct = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($rutaGuardarImg, $imageProduct);
            $product['image'] = "$imageProduct";
         }else{
            unset($product['image']);
         }
         $product->update($product);
         return redirect()->route('products.index');
    }

    public function destroy($id): RedirectResponse
    {
        Products::find($id)->delete();

        return redirect()->route('products.index');
    }
}
