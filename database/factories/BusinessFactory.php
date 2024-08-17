<?php
//
//namespace Database\Factories;
//
//use App\Models\Theme;
//use Illuminate\Database\Eloquent\Factories\Factory;
//
///**
// * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
// */
//class BusinessFactory extends Factory
//{
//    /**
//     * Define the model's default state.
//     *
//     * @return array<string, mixed>
//     */
//    public function definition(): array
//    {
//        return [
//            'name'=>fake()->text(5),
//            'description'=>fake()->text(30),
//            'speciality'=>fake()->jobTitle(),
//
//            'history'=>fake()->text(30),
//
//            'email' => fake()->unique()->safeEmail(),
//            'email_verified_at' => now(),
//
//            'address'=>fake()->address,
//            'logo'=>fake()->imageUrl(25,25),
//            'theme_id'=>Theme::all()->random()->id,
//        ];
//    }
//    public function unverified(): static
//    {
//        return $this->state(fn (array $attributes) => [
//            'email_verified_at' => null,
//        ]);
//    }
//}
