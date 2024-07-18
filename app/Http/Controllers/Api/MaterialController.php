<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MaterialResource;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = MaterialResource::collection(Material::all());
        return response()->json($materials, 200);
    }
    public function __invoke($materialId): JsonResponse
    {
        $products = Product::where('material_id', $materialId)
            ->get();
        return response()->json($products, 200);
    }
}
