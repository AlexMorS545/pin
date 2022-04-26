<?php

namespace Database\Factories;

use App\Models\Product;
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
    public function definition()
    {
        return [
            'article' => $this->faker->unique()->regexify('[a-z0-9]{10,12}'),
            'name' => $this->faker->randomElement(['MTOK-B2/216-1KT3645-K', 'MTOK-B3/216-1KT3645-K']),
            'status' => Product::AVAILABLE,
            'data' => [
                'color' => $this->faker->randomElement(['blue', 'red', 'white']),
                'size' => $this->faker->randomElement(['XS', 'M', 'L']),
            ]
        ];
    }
}
