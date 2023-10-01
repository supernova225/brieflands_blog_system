<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $publication = fake()->date('Y-m-d H-i-s');

        return [
            'user_id' => User::all()->random()->id,
            'title' => fake()->words(4, true),
            'main_content' => fake()->paragraph(),
            'publication' => $publication,
            'is_published' => $publication >= now() ? 0 : 1,
        ];
    }
}
