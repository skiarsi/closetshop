<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'image_path' => $this->faker->imageUrl(),
            'image_name' => $this->faker->word() . '.jpg',
            'image_type' => $this->faker->randomElement(['jpg', 'png', 'gif']),
            'is_thumbnail' => $this->faker->boolean(),
        ];
    }
}
