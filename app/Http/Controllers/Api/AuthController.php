<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\ZipCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required',
                    'address' => 'required',
                    'role_name' => 'required|exists:roles,name',
                    'zip_code_value' => 'required|exists:zip_codes,value',
                    'city_name' => 'required|exists:cities,name',
                ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $zipCode = ZipCode::where('value', $request->zip_code_value)->firstOrFail();
            $city = City::where('name', $request->city_name)->firstOrFail();
            $role = Role::where('name', $request->role_name)->firstOrFail();

            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'role_id' => $role->id,
                'zip_code_id' => $zipCode->id,
                'city_id' => $city->id,
            ]);

            return response()->json([
                'user'=> $user,
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'user' => $user,
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        try {
            if (auth()->check()) {
                auth()->user()->tokens()->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'User Logged Out Successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No user is currently logged in',
                ], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function updateUser(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'firstname' => 'sometimes|required',
                'lastname' => 'sometimes|required',
                'email' => 'sometimes|required|email|unique:users,email,' . $id,
                'password' => 'sometimes|required',
                'address' => 'sometimes|required',
                'role_name' => 'sometimes|required|exists:roles,name',
                'zip_code_value' => 'sometimes|required|exists:zip_codes,value',
                'city_name' => 'sometimes|required|exists:cities,name',
            ])->validate();

            $user = User::findOrFail($id);

            $user->update([
                'firstname' => $request->get('firstname', $user->firstname),
                'lastname' => $request->get('lastname', $user->lastname),
                'email' => $request->get('email', $user->email),
                'password' => bcrypt($request->get('password', $user->password)),
                'address' => $request->get('address', $user->address),
                'role_id' => $request->get('role_name', $user->role_id),
                'zip_code_id' => $request->get('zip_code_value', $user->zip_code_id),
                'city_id' => $request->get('city_name', $user->city_id),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Updated Successfully',
                'user' => $user
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

}
