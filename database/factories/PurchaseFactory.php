<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date,
            'supplier_id' => fake()->numberBetween(1, 10),
            'total' => fake()->randomFloat(2, 1, 1000),
            'invoice_no' => fake()->unique()->word,
            'user_id' => fake()->numberBetween(1, 10),
        ];
    }
}
