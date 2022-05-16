<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Http\Resources\Api\ProductResource;
use App\Models\Products\Products;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    public function index()
    {
        return ProductResource::collection(Products::paginate());
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = new Products();

        $product->code = $request['code'];
        $product->category = $request['category'];
        $product->brand = $request['brand'];
        $product->line = $request['line'];
        $product->model = $request['model'];
        $product->color = $request['color'];
        $product->transmission = $request['transmission'];
        $product->kilometre = $request['kilometre'];
        $product->engine = $request['engine'];
        $product->fuel = $request['fuel'];
        $product->torque = $request['torque'];
        $product->power = $request['power'];
        $product->price = $request['price'];
        $product->stock = $request['stock'];
        $product->description = $request['description'];

        $product->save();

        return ProductResource::make($product)->response()->setStatusCode(201);
    }


    public function update(UpdateProductRequest $request, $id): ProductResource
    {
       $product=Products::find($id);
       $product->update($request->validated());

       return ProductResource::make($product);
    }

    public function destroy($id): Response
    {
        $product=Products::find($id);
        $product->delete();

        return response(null, 204);
    }
}
