<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Business;
use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\Product;
use App\Models\Size;
use App\Models\Style;
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
        $arrayRequest = $request->all();

        $product = new Product();

        $style = Style::find($arrayRequest['style']);
        $category = Category::find($arrayRequest['category']);
        $business = Business::find($arrayRequest['business']);

        $color = Color::firstOrCreate(['name' => $arrayRequest['color']]);
        $material = Material::firstOrCreate(['name' => $arrayRequest['material']]);
        $size = Size::create($arrayRequest['size']);

        $product->description = $arrayRequest['description'];
        $product->name = $arrayRequest['name'];
        $product->image = $arrayRequest['image'];
        $product->price = $arrayRequest['price'];
        $product->stock = $arrayRequest['stock'];
        $product->active = $arrayRequest['active'];

        $product->style()->associate($style);
        $product->category()->associate($category);
        $product->business()->associate($business);

        $product->color()->associate($color);
        $product->material()->associate($material);
        $product->size()->associate($size);

        $product->save();

        return response()->json([
            'product'=>$product
        ]);
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

        return response()->json([
            'product' => $product
        ]);
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
