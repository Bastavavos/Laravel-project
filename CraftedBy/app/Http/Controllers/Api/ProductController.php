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
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
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

    /**
     * @throws AuthorizationException
     */
    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);

        $product = Product::create([
            'description' => $request->input('description'),
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'active' => $request->input('active'),
        ]);

        $category = Category::firstWhere('name', $request->input('category'));
        $color = Color::firstWhere('name', $request->input('color'));
        $material = Material::firstWhere('name', $request->input('material'));
        $style = Style::firstWhere('name', $request->input('style'));

        if (!$category || !$color || !$material || !$style) {
            return response()->json(['error' => 'One or more required attributes do not exist'], 404);
        }

        $size = Size::create($request->input('size'));
        $business = Business::find($request->input('business'));

        $product->style()->associate($style);
        $product->category()->associate($category);
        $product->color()->associate($color);
        $product->material()->associate($material);
        $product->business()->associate($business);
        $product->size()->associate($size);

        $product->save();

        $productResource = ProductResource::make($product);
        return response()->json([
            'product' => $productResource,
        ]);
    }

// old
//        $this->authorize('create', Product::class);
//
//        $arrayRequest = $request->all();
//
//        $product = new Product();
//
//        $category = Category::select()->where('name', $arrayRequest['category'])->first();
//        $color = Color::select()->where('name', $arrayRequest['color'])->first();
//        $material = Material::select()->where('name', $arrayRequest['material'])->first();
//        $style = Style::select()->where('name', $arrayRequest['style'])->first();
//
//        if (!$category || !$color || !$material || !$style) {
//            return response()->json(['error' => 'it does not exist'], 404);
//        }
//
//        $size = Size::create($arrayRequest['size']);
//        $business = Business::find($arrayRequest['business']);
//
//        $product->description = $arrayRequest['description'];
//        $product->name = $arrayRequest['name'];
//        $product->image = $arrayRequest['image'];
//        $product->price = $arrayRequest['price'];
//        $product->stock = $arrayRequest['stock'];
//        $product->active = $arrayRequest['active'];
//
//        $product->style()->associate($style);
//        $product->category()->associate($category);
//        $product->color()->associate($color);
//        $product->material()->associate($material);
//        $product->business()->associate($business);
//        $product->size()->associate($size);
//
//        $product->save();
//
//        $product = ProductResource::make($product);
//        return response()->json([
//            'product' => $product,
//        ]);
//    }

    public function show($id)
    {
        $product = ProductResource::make(Product::find($id));
        return response()->json([
            'product' => $product,
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function update(StoreProductRequest $request, $id)
    {
        $this->authorize('update', Product::class);

        $product = Product::find($id);
        $product->update($request->all());

        return response()->json([
            'product' => $product
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('delete', Product::class);

        $product = Product::find($id);
        $product->delete();
    }
}
