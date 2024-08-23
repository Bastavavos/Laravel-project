<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ColorResource;
use App\Models\Color;

class ColorController extends Controller
{
    public function index() {

        $colors = ColorResource::collection(Color::all());
        return response()->json($colors, 200);
    }
}
