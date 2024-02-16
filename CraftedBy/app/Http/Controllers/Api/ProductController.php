<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
       $products = ProductResource::collection(Product::all());
        return response()->json([
            'products'=>$products,
            'status'=>true
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        return $product = Product::create($request->all());
    }

    public function show($id)
    {
        $product = ProductResource::make(Product::find($id));
        return response()->json([
           'product'=>$product,
        ]);
    }

    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        $product->save();
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
