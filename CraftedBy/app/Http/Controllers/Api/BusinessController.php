<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusinessRequest;
use App\Http\Resources\BusinessResource;
use App\Models\Business;
use App\Models\City;
use App\Models\Theme;
use App\Models\ZipCode;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * @OA\Get(
     *     path="/business",
     *     summary="Get all businesses",
     *     tags={"Business"},
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */

    public function index()
    {
        $businesses = BusinessResource::collection(Business::all());
//        return response()->json([
//            'business'=>$businesses,
//            'status'=>true
//        ]);
        return response()->json($businesses, 200);
    }

    /**
     * @throws AuthorizationException
     */
    public function store(StoreBusinessRequest $request){

        $this->authorize('create', Business::class);

        $business = Business::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'email' => $request->input('email'),
            'history' => $request->input('history'),
            'address' => $request->input('address'),
            'logo' => $request->input('logo'),
            'speciality' => $request->input('speciality'),
        ]);

        $zipCode = ZipCode::firstOrCreate(['value' => $request->input('zip_code')]);
        $city = City::firstOrCreate(['name' => $request->input('city')]);
        $theme = Theme::find($request->input('theme'));

        $business->city()->associate($city);
        $business->zipCode()->associate($zipCode);
        $business->theme()->associate($theme);

        $business->save();

        $businessResource = BusinessResource::make($business);
        return response()->json([
            'business' => $businessResource
        ]);
    }

// old
//    {
//        $this->authorize('create', Business::class);
//
//        $arrayRequest = $request->all();
//
//        $business = new Business();
//
//        $zipCode = ZipCode::firstOrCreate(['value' => $arrayRequest['zip_code']]);
//        $city = City::firstOrCreate(['name' => $arrayRequest['city']]);
//        $theme = Theme::find($arrayRequest['theme']);
//
//        $business->name = $arrayRequest['name'];
//        $business->description = $arrayRequest['description'];
//        $business->email = $arrayRequest['email'];
//        $business->history = $arrayRequest['history'];
//        $business->address = $arrayRequest['address'];
//        $business->logo = $arrayRequest['logo'];
//        $business->speciality = $arrayRequest['speciality'];
//
//        $business->city()->associate($city);
//        $business->zipCode()->associate($zipCode);
//        $business->theme()->associate($theme);
//
//        $business->save();
//
//        $business = BusinessResource::make($business);
//        return response()->json([
//            'business'=>$business
//        ]);
//    }

    /**
     * @OA\Get(
     *     path="/business/{id}",
     *     summary="Get business",
     *     tags={"Business"},
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function show($id)
    {
        $business = BusinessResource::make(Business::find($id));
        return response()->json([
            'business' => $business,
        ]);
    }

    /**
     * @throws AuthorizationException
     */

    /**
     * @OA\Put(
     *     path="/business",
     *     summary="Update business",
     *     tags={"Business"},
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function update(StoreBusinessRequest $request, $id)
    {
        $this->authorize('update', Business::class);

        $business = Business::find($id);
        $business->update($request->all());

        return response()->json([
           'business' => $business
        ]);
    }

    /**
     * @throws AuthorizationException
     */

    /**
     * @OA\Delete(
     *     path="/business",
     *     summary="Delete business",
     *     tags={"Business"},
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function destroy($id)
    {
        $this->authorize('delete', Business::class);

        $business = Business::find($id);
        $business->delete();
    }
}
