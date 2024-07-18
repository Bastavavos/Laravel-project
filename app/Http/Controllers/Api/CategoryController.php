<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryResource::collection(Category::all());
        return response()->json($categories, 200);
    }
    public function __invoke($categoryId): JsonResponse
    {
        $products = Product::where('category_id', $categoryId)
            ->get();
        return response()->json($products, 200);
    }
}
