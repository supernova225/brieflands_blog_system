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
        // $user = User::factory()->create();
        //
        // dd($user);
        //
        // $this->actingAs($user);
        //
        // $response = $this->post(route('posts.store'), [
        //     'title' => 'sample title',
        //     'main_content' => 'sample main content',
        // ]);
        //
        // $response->assertStatus(201);
    }
}
