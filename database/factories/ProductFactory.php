<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(1, 3)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'description' => $this->faker->paragraph(3, 5),
            'price' => $this->faker->numberBetween(10000, 200000),
            'stock' => $this->faker->numberBetween(10, 200),
            'user_id' => mt_rand(1, 6),
            'category_id' => mt_rand(1, 4),
        ];
    }
}
