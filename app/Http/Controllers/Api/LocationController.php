<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ZipCode;

class LocationController extends Controller
{
    public function getZipCodes()
    {
        $zipCodes = ZipCode::all();
        return response()->json($zipCodes);
    }

    public function getCities()
    {
        $cities = City::all();
        return response()->json($cities);
    }

    public function showCity($id)
    {
        $city = City::find($id);
        return response()->json($city);
    }
}
