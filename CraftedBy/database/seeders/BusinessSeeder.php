<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\City;
use App\Models\Product;
use App\Models\Speciality;
use App\Models\Theme;
use App\Models\User;
use App\Models\ZipCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business::factory()
            ->count(5)
            ->for(ZipCode::factory()->create())
            ->for(City::factory()->create())
            ->create();

        Business::all()->each(function ($biz) {
            $biz->owner()->attach(User::all()->random(rand(1, 2))->pluck('id'));
        });
    }
}
