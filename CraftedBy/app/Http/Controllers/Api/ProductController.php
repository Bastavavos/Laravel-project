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
            'products' => $products,
            'status' => true
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $arrayRequest = $request->all();

        $product = new Product();

        $category = Category::select()->where('name', $arrayRequest['category'])->first();
        $color = Color::select()->where('name', $arrayRequest['color'])->first();
        $material = Material::select()->where('name', $arrayRequest['material'])->first();
        $style = Style::select()->where('name', $arrayRequest['style'])->first();

        if (!$category || !$color || !$material || !$style) {
            return response()->json(['error' => 'it does not exist'], 404);
        }

        $size = Size::create($arrayRequest['size']);
        $business = Business::find($arrayRequest['business']);

        $product->description = $arrayRequest['description'];
        $product->name = $arrayRequest['name'];
        $product->image = $arrayRequest['image'];
        $product->price = $arrayRequest['price'];
        $product->stock = $arrayRequest['stock'];
        $product->active = $arrayRequest['active'];

        $product->style()->associate($style);
        $product->category()->associate($category);
        $product->color()->associate($color);
        $product->material()->associate($material);

        $product->business()->associate($business);
        $product->size()->associate($size);

        $product->save();

        $product = ProductResource::make($product);
        return response()->json([
            'product' => $product,
        ]);
    }

    public function show($id)
    {
        $product = ProductResource::make(Product::find($id));
        return response()->json([
            'product' => $product,
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
