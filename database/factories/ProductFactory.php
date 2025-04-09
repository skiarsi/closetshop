<?php

namespace Database\Factories;

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
        return [
            'name'  => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'details' => json_encode([
                'color' => $this->faker->colorName(),
                'available_colors' => [
                    [
                        'name'  => 'red',
                        'hex'   => '#FF0000',
                    ],[
                        'name'  => 'green',
                        'hex'   => '#00FF00',
                    ],[
                        'name'  => 'blue',
                        'hex'   => '#0000FF',
                    ],[
                        'name'  => 'yellow',
                        'hex'   => '#FFFF00',
                    ],[
                        'name'  => 'black',
                        'hex'   => '#000000',
                    ],[
                        'name'  => 'white',
                        'hex'   => '#FFFFFF',
                    ],[
                        'name'  => 'purple',
                        'hex'   => '#800080',
                    ],[
                        'name'  => 'orange',
                        'hex'   => '#FFA500',
                    ],[
                        'name'  => 'pink',
                        'hex'   => '#FFC0CB',
                    ],
                ],
                'material' => $this->faker->word(),
                'available_sizes' => 'S,M,L,XL',
                'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            ]),
        ];
    }
}
