<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Products\Products;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use function config;
use function redirect;
use function view;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-productos|crear-productos|editar-productos|borrar-productos')->only('index');
         $this->middleware('permission:crear-productos', ['only' => ['create','store']]);
         $this->middleware('permission:editar-productos', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-productos', ['only' => ['destroy']]);
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

    public function show(Products $product): View
    {
        $exchange = config('app.exchange');

        return view('products.show',compact('product','exchange'));
    }

    public function edit(Products $product): View
    {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Products $product): RedirectResponse
    {
        $prod = $request->all();
         if($image = $request->file('image')){
            $rutaGuardarImg = 'image/';
            $imageProduct = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($rutaGuardarImg, $imageProduct);
            $prod['image'] = "$imageProduct";
         }else{
            unset($prod['image']);
         }
         $product->update($prod);
         return redirect()->route('products.index');
    }

    public function destroy($id): RedirectResponse
    {
        Products::find($id)->delete();
        return redirect()->route('products.index');
    }
}
