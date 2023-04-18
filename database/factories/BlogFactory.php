<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'category_id' => 1,
            'image' => public_path('assets\img\backgrounds\18.jpg'),
            'blog_title' => $this->faker->sentence(),
            'blog_description' => $this->faker->text($maxNBChars = 1000),
            'meta_title' =>  $this->faker->text($maxNBChars = '60'),
            'meta_description' => $this->faker->text($maxNBChars = 150),
        ];
    }
}
