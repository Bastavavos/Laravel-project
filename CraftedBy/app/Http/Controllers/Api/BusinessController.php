<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessResource;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        return BusinessResource::collection(Business::all());
    }

    public function store(Request $request):void
    {
        Business::create($request->all());
    }

    public function show(Business $business)
    {
        return $business;
    }

    public function update(Request $request, Business $business):bool
    {
        return $business->update($request->all());
    }

    public function destroy(Business $business): void
    {
        $business->delete();
    }
}
