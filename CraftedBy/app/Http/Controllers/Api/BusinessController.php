<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusinessRequest;
use App\Http\Resources\BusinessResource;
use App\Models\Business;
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
       return $business = Business::create($request->all());
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
        $business->save();
    }

    public function destroy($id)
    {
        $business = Business::find($id);
        $business->delete();
    }
}
