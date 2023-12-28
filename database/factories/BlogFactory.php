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
        $cover_image = glob(public_path('ImageFolder/*'));
        $randonCoverImages = basename($cover_image[array_rand($cover_image)]);

        return [
            'user_id' => 1,
            'category_id' => mt_rand(1, 2),
            'cover_image' =>  $randonCoverImages,
            'blog_title' => $this->faker->sentence(),
            'blog_description' => $this->faker->text($maxNBChars = 1000),
            'meta_title' =>  $this->faker->text($maxNBChars = '60'),
            'meta_description' => $this->faker->text($maxNBChars = 150),
        ];
    }
}
