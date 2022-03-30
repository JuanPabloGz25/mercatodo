<?php

namespace Database\Factories\Products;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

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
            'category' => $this->faker->words(2, true),
            'brand' => $this->faker->words(2, true),
            'line' => $this->faker->words(2, true),
            'model' => '2020',
            'color' => $this->faker->words(2, true),
            'transmission' => $this->faker->words(2, true),
            'kilometre' => '2.500',
            'engine' => $this->faker->words(5, true),
            'fuel' => $this->faker->words(2, true),
            'torque' => $this->faker->words(2, true),
            'power' => $this->faker->words(2, true),
            'price' => $this->faker->randomDigitNotZero(),
            'stock' => $this->faker->randomDigitNotZero(),
            'description' => $this->faker->words(2, true),
            'image' => UploadedFile::fake()->image('product.jpg', 500, 250)->size(50),
        ];
    }
}
