<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostLog>
 */
class PostLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $modifier = User::all()->random();

        $author = User::all()->random();

        $acceptedUser = fake()->randomElement([$modifier, $author]);

        $post = Post::all()->random();

        return [
            'modifier_id' => $acceptedUser->id,
            'modifier_first_name' => $acceptedUser->first_name,
            'modifier_last_name' => $acceptedUser->last_name,
            'modify_type' => fake()->randomElement(['update', 'delete']),
            'post_id' => $post->id,
            'author_id' => $author->id,
            'author_first_name' => $author->first_name,
            'author_last_name' => $author->last_name,
        ];
    }
}
