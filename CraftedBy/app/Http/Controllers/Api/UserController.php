<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\City;
use App\Models\User;
use App\Models\ZipCode;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', UserController::class);

        $users = UserResource::collection(User::all());
        return response()->json([
            'users' => $users,
            'status' => true
        ]);
    }


// switch with function createUSer in my AuthController or move this function here

//    public function store(StoreUserRequest $request)
//    {
//        $arrayRequest = $request->all();
//
//        $zipCode = ZipCode::firstOrCreate(['value' => $arrayRequest['zip_code']]);
//        $city = City::firstOrCreate(['name' => $arrayRequest['city']]);
//
//        $user = new User();
//        $user->firstname = $arrayRequest['firstname'];
//        $user->lastname = $arrayRequest['lastname'];
//        $user->email = $arrayRequest['email'];
//        $user->address = $arrayRequest['address'];
//        $user->password = $arrayRequest['password'];
//
//        $user->city()->associate($city);
//        $user->zipCode()->associate($zipCode);
//
//        $user->save();
//
//        return response()->json([
//           'user'=>$user
//        ]);
//    }

    public function show($id)
    {
        $user = UserResource::make(User::find($id));
        return response()->json([
            'user' => $user,
        ]);
    }

    public function update(StoreUserRequest $request, $id)
    {
        $user = User::find($id);

        $arrayRequest = $request->all();
        $zipCode = ZipCode::firstOrCreate(['value' => $arrayRequest['zip_code']]);
        $city = City::firstOrCreate(['name' => $arrayRequest['city']]);

        $user->firstname = $arrayRequest['firstname'];
        $user->lastname = $arrayRequest['lastname'];
        $user->email = $arrayRequest['email'];
        $user->address = $arrayRequest['address'];

        if ($arrayRequest['password']) {
            $user->password = Hash::make($arrayRequest['password']);
        }

        $user->city()->associate($city);
        $user->zipCode()->associate($zipCode);

        $user->save();

        return response()->json([
            'user' => $user
        ]);
    }
}
