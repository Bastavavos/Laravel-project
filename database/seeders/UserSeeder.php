<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\ZipCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    private static string $password;

    /**
     * Run the database seeds.
     */
//    public function run(): void
//    {
//        $faker = Faker::create();
//        $roles = DB::table('roles')->pluck('name')->toArray();
//
//        User::factory()
//            ->count(5)
//            ->for(City::factory()->create())
//            ->for(ZipCode::factory()->create())
//            ->create(function (array $attributes) use ($roles, $faker) {
//
//                // Filter out the role_name of Owner
//
//                $filteredRoles = array_filter($roles, function ($role) {
//                    return $role != 'Owner';
//                });
//                return ['role_id' => $faker->randomElement($filteredRoles)];
//            });
//
//        DB::table('users')->insert([
//            'id' => uuid_create(),
//            'firstname' => 'Bastos',
//            'lastname' => 'superAdmin',
//            'email' => 'bastien.pelletier74@gmail.com',
//            'email_verified_at' => null,
//            'password' => static::$password ??= Hash::make('password'),
//            'remember_token' => Str::random(10),
//            'address' => '0',
//            'zip_code_id' => '0',
//            'city_id' => '0',
//            'role_id' => 'Owner',
//        ]);
//    }
    public function run(): void
    {
        $faker = Faker::create();
        $roleIds = Role::where('name', '<>', 'Owner')->get()->pluck('id')->toArray();

        User::factory()
            ->count(5)
            ->for(City::factory()->create())
            ->for(ZipCode::factory()->create())
            ->create(function (array $attributes) use ($roleIds, $faker) {

                // Sélectionnez aléatoirement un ID de rôle
                $selectedRoleId = $faker->randomElement($roleIds);
                return ['role_id' => $selectedRoleId];
            });

        // Insertion du super administrateur avec un rôle spécifique
        DB::table('users')->insert([
            'id' => uuid_create(), // Assurez-vous que cette fonction existe et renvoie un UUID valide
            'firstname' => 'Bastos',
            'lastname' => 'Administrator',
            'image' => null,
            'email' => 'bastien.pelletier74@gmail.com',
            'email_verified_at' => null,
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'address' => '0',
            'zip_code_id' => '0',
            'city_id' => '0',
            'role_id' => Role::where('name', 'Owner')->first()->id, // Trouvez le rôle par son nom et utilisez son ID
        ]);
    }
}
