<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\Product;
use App\Models\Size;
use App\Models\Style;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()
            ->count(3)
//            ->for(Business::factory()->create()) // ON NE RECREER PAS UN BUSINESS QUAND ON CREER UN PRODUIT !
            ->for(Color::factory()->create())
            ->for(Material::factory()->create())
            ->for(Style::factory()->create())
            ->for(Category::factory()->create())
            ->for(Size::factory()->create())
            ->create();
    }
}
