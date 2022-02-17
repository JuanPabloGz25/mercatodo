<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->randomDigitNotZero(),
            'marca' => $this->faker->words(2, true),
            'linea' => $this->faker->words(2, true),
            'especificaciones' => $this->faker->words(5, true),
            'price' => $this->faker->randomDigitNotZero(),
            'stock' => $this->faker->randomDigitNotZero(),
            'image' => UploadedFile::fake()->image('product.jpg', 500, 250)->size(50),
        ];
    }
}
