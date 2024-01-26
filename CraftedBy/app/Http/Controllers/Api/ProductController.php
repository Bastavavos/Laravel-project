<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

// view comments on UserController

    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function store(Request $request):void
    {
        Product::create($request->all());
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product):bool
    {
        return $product->update($request->all());
    }

    public function destroy(Product $product): void
    {
        $product->delete();
    }
}
