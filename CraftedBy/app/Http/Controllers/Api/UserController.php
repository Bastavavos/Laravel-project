<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

//  Display a listing of the resource.

    public function index()
    {
        return UserResource::collection(User::all());
    }

//  Store a newly created resource in storage.

    public function store(Request $request): void
    {
        User::create($request->all());
    }

//   Display the specified resource.

    public function show($id): UserResource
    {
        return UserResource::make(User::find($id));
    }

//  Update the specified resource in storage.

    public function update(Request $request, User $user): bool
    {
       return $user->update($request->all());
    }

//  Remove the specified resource from storage.

    public function destroy(User $user):void
    {
        $user->delete();
    }
}
