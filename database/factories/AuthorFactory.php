<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'name'=> fake()->name,
           'email' =>fake()->email,
           'twitter_link' => fake()->url,
            'github_link' => fake()->url,
            'website_link' => fake()->url,
            'about_info' => fake()->realText
        ];
    }
}
