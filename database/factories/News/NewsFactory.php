<?php

namespace Database\Factories\News;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(2, true),
            'description' => $this->faker->words(2, true),
            'image' => UploadedFile::fake()->image('product.jpg', 500, 250)->size(50),
            'content' => $this->faker->words(2, true),
            'author' => $this->faker->words(5, true),
            'date' => $this->faker->words(2, true),
            'category' => $this->faker->words(2, true),
        ];
    }
}
