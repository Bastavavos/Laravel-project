<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\Style;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $artisanUser = User::whereHas('role', function ($query) {
            $query->where('name','Artisan');
        })->exists();

        $style = Style::all()->random(1)->value('id');
        $material = Material::all()->random(1)->value('id');
        $color = Color::all()->random(2)->value('id');
        $category = Category::all()->random(1)->value('id');

        return [
            'name'=>fake()->word,
            'user_id'=>$artisanUser,
            'category_id'=>$category,
            'color_id'=>$color,
            'material_id'=>$material,
            'style_id'=>$style,
            'description'=>fake()->text(30),
            'price'=>fake()->randomFloat(2,5,600),
            'stock'=>fake()->numberBetween(0,100),
            'image'=>fake()->imageUrl(50,50),
            'active'=>fake()->boolean,
        ];
    }
}
