<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\Product;
use App\Models\Size;
use App\Models\Style;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artisanUsers = User::whereHas('role', function ($query) {
            $query->where('name', 'Artisan');
        })->get();

        foreach ($artisanUsers as $user) {
            Product::factory()
                ->count(120)
                ->for(Size::factory()->create())
                ->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
