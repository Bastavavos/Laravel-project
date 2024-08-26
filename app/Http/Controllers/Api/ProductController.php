<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
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


use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;




//        $products = ProductResource::collection(Product::all());
//        return response()->json([
//            'products' => $products,
//        ]);
class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/products",
     *     summary="Get all products",
     *     tags={"Product"},
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
     *    @OA\Response(response=200, description="Success"),
     *    @OA\Response(response=400, description="Invalid request"),
     *    @OA\Response(response=404, description="Product not found")
     * )
     */
    public function index()
    {
        $products = ProductResource::collection(Product::with([
            'artisan', 'category', 'color', 'material', 'style', 'size',
        ])->get());
        return response()->json($products, 200);
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
    public function productsByUserId($userId)
    {
        $user = User::with('role')->find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        if ($user->role->name === 'Customer') {
            return response()->json(['error' => 'This user is not an artisan'], 400);
        } elseif ($user->role->name === 'Artisan') {
            $products = ProductResource::collection(
                Product::where('user_id', $userId)->with([
                    'artisan', 'category', 'color', 'material', 'style', 'size',
                ])->get()
            );
            if ($products->isEmpty()) {
                return response()->json(['error' => 'This artisan has no products in stock'], 404);
            }
            return response()->json($products, 200);
        } else {
            return response()->json(['error' => 'User role not recognized'], 400);
        }
    }

    /**
     * @throws AuthorizationException
     */
    public function store(StoreProductRequest $request)
    {
//        $this->authorize('create', Product::class);
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $category = Category::firstWhere('name', $request->input('category'));
        $categoryId = $category->id;

        $style = Style::firstWhere('name', $request->input('style'));
        $styleId = $style->id;

        $color = Color::firstWhere('name', $request->input('color'));
        $colorId = $color->id;

        $material = Material::firstWhere('name', $request->input('material'));
        $materialId = $material->id;

        $size = Size::firstWhere('name', $request->input('size'));
        $sizeId = $size->id;

        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
//            'active' => $request->input('active'),
            'active' => $request->input('active') ? 1 : 0,
            'user_id'=> Auth::id(),
            'category_id' => $categoryId,
            'material_id' => $materialId,
            'color_id'=> $colorId,
            'style_id'=> $styleId,
            'size_id'=> $sizeId
        ]);

        $product->style()->associate($style);
        $product->category()->associate($category);
        $product->color()->associate($color);
        $product->material()->associate($material);
        $product->size()->associate($size);

        $product->artisan()->associate(Auth::id());
        $product->save();

        $productResource = ProductResource::make($product);
        return response()->json([
            'product' => $productResource,
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
//        $this->authorize('update', Product::class);

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
//        $this->authorize('delete', Product::class);
        $product = Product::find($id);
        $product->delete();
    }
}
