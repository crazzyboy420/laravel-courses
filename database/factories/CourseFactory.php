<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\platform;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->text(40),
            'type' =>rand(0,1),
            'resources'=> rand(0,10),
            'duration'=> rand(0,2),
            'price'   => rand(1.00,50.00),
            'year'  => fake()->year,
            'description' => fake()->paragraphs(3,true),
            'image_url' => fake()->imageUrl,
            'link' => fake()->url,
            'submitted_by' => User::all()->random()->id,
            'platform_id' => platform::all()->random()->id,
            'level_id'    => Level::all()->random()->id,
        ];
    }
}
