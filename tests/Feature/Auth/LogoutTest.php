<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLogoutWhenUserWhenLoggedIn(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('logout'));

        $response->assertStatus(200);
    }

    public function testLogoutWhenUserNotLoggedIn(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('logout'));

        $response->assertStatus(302);
    }
}
