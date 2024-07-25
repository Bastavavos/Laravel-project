<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StyleResource;
use App\Models\Product;
use App\Models\Style;
use Illuminate\Http\JsonResponse;

class StyleController extends Controller
{
    public function index()
    {
        $styles = StyleResource::collection(Style::all());
        return response()->json($styles, 200);
    }
    public function __invoke($styleId): JsonResponse
    {
        $products = Product::where('style_id', $styleId)
            ->get();
        return response()->json($products, 200);
    }
}
