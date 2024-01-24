<?php

namespace Database\Factories;

use App\Models\Business;
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
        $biz = Business::all()->random(1)->value('id');
        return [
            'name'=>fake()->name,
            'business_id'=>$biz,
            'description'=>fake()->text(30),
            'price'=>fake()->randomFloat(2,5,600),
            'stock'=>fake()->numberBetween(0,100),
            'image'=>fake()->imageUrl(50,50),
            'active'=>fake()->boolean()
        ];
    }
}
