<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testLoginUser(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => '123456789',
        ]);

        $response->assertStatus(200);
    }

    public function testLoginUserWithWrongEmail(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => 'qwerq@gmail.com',
            'password' => '123456789',
        ]);

        $response->assertStatus(500);
    }
    // dd($response->getStatusCode());

    public function testLoginUserWithWrongPassword(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => '1234567899999',
        ]);

        $response->assertStatus(500);
    }
}
