<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusinessRequest;
use App\Http\Resources\BusinessResource;
use App\Models\Business;
use App\Models\City;
use App\Models\Theme;
use App\Models\ZipCode;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = BusinessResource::collection(Business::all());
        return response()->json([
            'business'=>$businesses,
            'status'=>true
        ]);
    }

    public function store(StoreBusinessRequest $request)
    {
        $arrayRequest = $request->all();
        $zipCode = ZipCode::firstOrCreate(['value' => $arrayRequest['zip_code']]);
        $city = City::firstOrCreate(['name' => $arrayRequest['city']]);
        $theme = Theme::firstOrCreate(['layer', 'color_1', 'color_2' => $arrayRequest['size']]);

        $business = new Business();
        $business->name = $arrayRequest['name'];
        $business->description = $arrayRequest['description'];
        $business->email = $arrayRequest['email'];
        $business->history = $arrayRequest['history'];
        $business->address = $arrayRequest['address'];
        $business->logo = $arrayRequest['logo'];

        $business->city()->associate($city);
        $business->zipCode()->associate($zipCode);
        $business->theme()->associate($theme);

        $business->save();

        return response()->json([
            'business'=>$business
        ]);
    }

    public function show($id)
    {
        $business = BusinessResource::make(Business::find($id));
        return response()->json([
            'business' => $business,
        ]);
    }

    public function update(StoreBusinessRequest $request, $id)
    {
        $business = Business::find($id);

        $arrayRequest = $request->all();
        $zipCode = ZipCode::firstOrCreate(['value' => $arrayRequest['zip_code']]);
        $city = City::firstOrCreate(['name' => $arrayRequest['city']]);
        $theme = Theme::firstOrCreate(['layer', 'color_1', 'color_2' => $arrayRequest['size']]);

        $business->name = $arrayRequest['name'];
        $business->description = $arrayRequest['description'];
        $business->email = $arrayRequest['email'];
        $business->history = $arrayRequest['history'];
        $business->address = $arrayRequest['address'];
        $business->logo = $arrayRequest['logo'];

        $business->city()->associate($city);
        $business->zipCode()->associate($zipCode);
        $business->theme()->associate($theme);

        $business->save();

        return response()->json([
            'business' => $business
        ]);
    }

    public function destroy($id)
    {
        $business = Business::find($id);
        $business->delete();
    }
}
