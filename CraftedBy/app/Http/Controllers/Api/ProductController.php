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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


use OpenApi\Annotations as OA;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/products",
     *     summary="Get all products",
     *     tags={"Product"},
     *
     *     @OA\Parameter(
     *     name="color",
     *     in="query",
     *     description="Add color filter",
     *     required=false,
     *     @OA\Schema(type="string")
     *     ),
     *      @OA\Parameter(
     *      name="material",
     *      in="query",
     *      description="Add material filter",
     *      required=false,
     *      @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *      name="style",
     *      in="query",
     *      description="Add style filter",
     *      required=false,
     *      @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *      name="category",
     *      in="query",
     *      description="Add category filter",
     *      required=false,
     *      @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *      name="size",
     *      in="query",
     *      description="Add size filter",
     *      required=false,
     *      @OA\Schema(type="string")
     *      ),
     *       @OA\Parameter(
     *       name="business",
     *       in="query",
     *       description="Add business filter",
     *       required=false,
     *       @OA\Schema(type="string")
     *       ),
     *
     *    @OA\Response(response=200, description="Success"),
     *    @OA\Response(response=400, description="Invalid request"),
     *    @OA\Response(response=404, description="Product not found")
     * )
     */

    public function index()
    {
        $products = ProductResource::collection(Product::all());
        return response()->json($products, 200);
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

    /**
     * @OA\Get(
     *     path="/products/{id}",
     *     summary="Get one product",
     *     tags={"Product"},
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/products/{id}",
     *     summary="Update product",
     *     tags={"Product"},
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
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

    /**
     * @OA\Delete(
     *     path="/products/{id}",
     *     summary="Delete product",
     *     tags={"Product"},
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */

    public function destroy($id)
    {
        $this->authorize('delete', Product::class);
        $product = Product::find($id);
        $product->delete();
    }
}
