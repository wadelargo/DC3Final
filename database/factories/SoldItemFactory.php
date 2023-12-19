<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoldItem>
 */
class SoldItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merchandise_id' => $this->faker->numberBetween(1, 10),
            'sale_id' => rand(1, 10), 
            'qty' => $this->faker->numberBetween(1, 1000),
            'selling_price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
