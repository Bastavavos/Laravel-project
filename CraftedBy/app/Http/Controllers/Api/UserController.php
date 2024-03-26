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
    public function index()
    {
//        $this->authorize('viewAny', User::class);

        $users = UserResource::collection(User::all());
        return response()->json([
            'users' => $users,
            'status' => true
        ]);
    }


// switch with function createUSer in my AuthController

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
        $user->role = $arrayRequest['role'];

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

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
//Illuminate\Database\QueryException: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`CraftedBy_DB`.`invoice_product`, CONSTRAINT `invoice_product_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`)) (Connection: mysql, SQL: delete from `users` where `id` = 9ba6362c-f17a-4f93-ac70-0526c31f22d2) in file /home/user/Bureau/Laravel-Project/CraftedBy/vendor/laravel/framework/src/Illuminate/Database/Connection.php on line 822
//Illuminate\Database\QueryException: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`CraftedBy_DB`.`invoice_status`, CONSTRAINT `invoice_status_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`)) (Connection: mysql, SQL: delete from `users` where `id` = 9ba637a5-3676-46f9-bad6-2e34ef29125b) in file /home/user/Bureau/Laravel-Project/CraftedBy/vendor/laravel/framework/src/Illuminate/Database/Connection.php on line 822
//Illuminate\Database\QueryException: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`CraftedBy_DB`.`users_business`, CONSTRAINT `users_business_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)) (Connection: mysql, SQL: delete from `users` where `id` = 9ba63846-c134-48a2-b998-90c3bbf1fac0) in file /home/user/Bureau/Laravel-Project/CraftedBy/vendor/laravel/framework/src/Illuminate/Database/Connection.php on line 822

}
