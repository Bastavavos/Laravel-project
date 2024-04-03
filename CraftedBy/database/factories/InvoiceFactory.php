<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Assuming you want to exclude the user with id 1
        $excludedId = 1;

        // Select a random user excluding the specified id
        $user = User::where('id', '!=', $excludedId)->inRandomOrder()->first()->id;
        return [
            'customer_id' => $user,
        ];
    }
}
