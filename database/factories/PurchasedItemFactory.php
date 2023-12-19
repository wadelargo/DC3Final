<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchasedItem>
 */
class PurchasedItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merchandise_id' => fake()->numberBetween(1, 10),
            'purchase_id' => fake()->numberBetween(1, 10),
            'whole_sale_qty' => fake()->numberBetween(1, 1000),
            'purchase_price' => fake()->randomFloat(10, 2),
        ];
    }
}
