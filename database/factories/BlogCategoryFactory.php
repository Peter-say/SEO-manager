<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'image' => public_path('assets\img\backgrounds\18.jpg'),
           'name' => $this->faker->text($maxNBChars = 10)
        ];
    }
}
