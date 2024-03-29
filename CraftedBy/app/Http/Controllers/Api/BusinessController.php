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

        $business = new Business();

        $zipCode = ZipCode::firstOrCreate(['value' => $arrayRequest['zip_code']]);
        $city = City::firstOrCreate(['name' => $arrayRequest['city']]);
        $theme = Theme::find($arrayRequest['theme']);

        $business->name = $arrayRequest['name'];
        $business->description = $arrayRequest['description'];
        $business->email = $arrayRequest['email'];
        $business->history = $arrayRequest['history'];
        $business->address = $arrayRequest['address'];
        $business->logo = $arrayRequest['logo'];
        $business->speciality = $arrayRequest['speciality'];

        $business->city()->associate($city);
        $business->zipCode()->associate($zipCode);
        $business->theme()->associate($theme);

        $business->save();

        $business = BusinessResource::make($business);
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
        $business->update($request->all());

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
