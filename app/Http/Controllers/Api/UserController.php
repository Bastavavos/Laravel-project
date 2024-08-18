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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @return JsonResponse
     * @throws AuthorizationException
     */

    /**
     * @OA\Get(
     *     path="/users",
     *     summary="Get all users",
     *     tags={"User"},
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */

    public function index()
    {
//        $this->authorize('viewAny', User::class);

        $users = UserResource::collection(User::all());

        return response()->json([
            'users' => $users,
            'status' => true
        ]);
    }

    public function indexArtisan()
    {
        $users = UserResource::collection(User::whereHas('role', function ($query) {
            $query->where('name', 'Artisan');
        })->get());
        return response()->json($users, 200);
    }
    public function showArtisan($id)
    {
        $user = User::find($id);
        if ($user && $user->role->name === 'Artisan') {
            $userResource = UserResource::make($user);
            return response()->json([
                'user' => $userResource
            ]);
        }
        return response()->json([
            'message' => 'Artisan not found'
        ], 404);
    }

    /**
     * @throws AuthorizationException
     */

    /**
     * @OA\Get(
     *     path="/users/{id}",
     *     summary="Get one user",
     *     tags={"User"},
     *     @OA\Parameter (
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function show($id)
    {
//        $this->authorize('view', User::class);

        $user = UserResource::make(User::find($id));
        return response()->json([
            'user' => $user
        ]);
    }

    /**
     * @throws AuthorizationException
     */

    /**
     * @OA\Delete (
     *     path="/users/{id}",
     *     summary="Delete user",
     *     tags={"User"},
     *     @OA\Response(response=200, description="Success"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */

    public function destroy($id)
    {
//        $this->authorize('delete', User::class);

        $user = User::find($id);
        $user->delete();
    }
}

