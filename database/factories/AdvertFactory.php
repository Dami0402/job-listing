<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advert>
 */
class AdvertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $title = fake()->sentence(),
            'description' => fake()->sentence(),
            'location' => fake()->address(),
            'name' => fake()->sentence(),
            'number' => fake()->phoneNumber(),
            'slug' => str()->slug($title),
            'views_count' => fake()->randomNumber(5),
            'is_published' => true,
            'user_id' => User::factory()
        ];
    }
}
