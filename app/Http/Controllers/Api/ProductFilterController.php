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

    //    public function filter($categoryId, $styleId, $materialId): JsonResponse
//    {
//        $category = Category::find($categoryId);
//        $style = Style::find($styleId);
//        $material = Material::find($materialId);
//
//        if (!$category || !$style || !$material) {
//            return response()->json(['error' => 'Category, style or material not found'], 404);
//        }
//
//        $products = Product::where('category_id', $category->id)
//            ->whereHas('style', function ($query) use ($styleId) {
//                $query->where('style_id', $styleId);
//            })
//            ->whereHas('material', function ($query) use ($materialId) {
//                $query->where('material_id', $materialId);
//            })
//            ->get();
//
//        return response()->json($products, 200);
//    }
}
