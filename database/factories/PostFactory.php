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
        $publicationDate = fake()->date('Y-m-d H-i-s');

        return [
            'author_id' => User::all()->random()->id,
            'title' => fake()->words(4, true),
            'main_content' => fake()->paragraph(),
            'publication_date' => $publicationDate,
            'is_published' => $publicationDate >= now() ? 0 : 1,
        ];
    }
}
