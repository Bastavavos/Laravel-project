<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\ZipCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(5)
            ->for(City::factory()->create())
            ->for(ZipCode::factory()->create())
            ->state(new Sequence(
                ['role' => 'admin'],
                ['role' => 'customer']
            ))
            ->create();
    }
}
