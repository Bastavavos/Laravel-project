<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'id' => uuid_create(),
            'name' => 'Owner'
        ]);

        $roles = ['Artisan', 'Customer', 'Visitor'];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'id' => uuid_create(),
                'name' => $role
            ]);
        }
    }
}
