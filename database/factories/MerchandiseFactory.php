<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchandise>
 */
class MerchandiseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => $this->faker->word,
            'description' => $this->faker->sentence,
            'retail_price' => $this->faker->randomFloat(2, 10, 100),
            'whole_sale_price' => $this->faker->randomFloat(2, 5, 50),
            'whole_sale_qty' => $this->faker->randomNumber(2),
            'qty_stock' => $this->faker->randomNumber(3),
        ];
    }
}
