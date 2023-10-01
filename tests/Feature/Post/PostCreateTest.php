<?php

namespace Tests\Feature\Post;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCreatePost(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('posts.store'), [
            'title' => 'sample title',
            'main_content' => 'sample main content',
        ]);

        $response->assertStatus(201);
    }

    public function testShowPostWhenUserIsLoginAndOwner(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $post = auth()->user()->posts()->create([
            'title' => 'sample title',
            'main_content' => 'sample main content',
            'publication_date' => '2024-05-22',
            'is_published' => 0,
        ]);

        $response = $this->get(route('posts.show', $post->id));

        $response->assertStatus(200);
    }

    public function testShowPostWhenUserIsLoginAndNotOwner(): void
    {
        $user1 = User::factory()->create();

        $user2 = User::factory()->create();

        $this->actingAs($user1);

        $post = $user1->posts()->create([
            'title' => 'sample title',
            'main_content' => 'sample main content',
            'publication_date' => '2024-05-22',
            'is_published' => 0,
        ]);

        $this->post(route('logout'));

        $user2 = User::factory()->create();

        $user2->update([
            'is_admin' => 'user',
        ]);

        $this->actingAs($user2);

        $response = $this->get(route('posts.show', $post->id));

        $response->assertStatus(403);
    }
}
