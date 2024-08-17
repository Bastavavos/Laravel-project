<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MaterialResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\StyleResource;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductFilterController extends Controller
{
    public function filter(?string $categoryId = null, ?string $styleId = null, ?string $materialId = null): JsonResponse
    {
        $query = Product::query();

        if ($categoryId !== null) {
            $category = Category::find($categoryId);
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }
        if ($styleId !== null) {
            $style = Style::find($styleId);
            if ($style) {
                $query->whereHas('style', function ($query) use ($styleId) {
                    $query->where('style_id', $styleId);
                });
            }
        }
        if ($materialId !== null) {
            $material = Material::find($materialId);
            if ($material) {
                $query->whereHas('material', function ($query) use ($materialId) {
                    $query->where('material_id', $materialId);
                });
            }
        }
        $products = $query->get();
        return response()->json($products, 200);
    }
}

//public function filter(Request $request): JsonResponse
//    {
//        $categoryId = $request->query('categoryId');
//        $styleId = $request->query('styleId');
//        $materialId = $request->query('materialId');
//
//        $query = Product::query();
//
//        if ($categoryId) {
//            $category = Category::find($categoryId);
//            if ($category) {
//                $query->where('category_id', $category->id);
//            }
//        }
//        if ($styleId) {
//            $style = Style::find($styleId);
//            if ($style) {
//                $query->whereHas('style', function ($query) use ($styleId) {
//                    $query->where('style_id', $styleId);
//                });
//            }
//        }
//        if ($materialId) {
//            $material = Material::find($materialId);
//            if ($material) {
//                $query->whereHas('material', function ($query) use ($materialId) {
//                    $query->where('material_id', $materialId);
//                });
//            }
//        }
//        $products = $query->get();
//
//        $productsResource = ProductResource::collection($products);
//
//        return response()->json([
//            'products' => $productsResource,
//            'category' => $categoryId ? new CategoryResource($category) : null,
//            'style' => $styleId ? new StyleResource($style) : null,
//            'material' => $materialId ? new MaterialResource($material) : null,
//        ], 200);
//    }

