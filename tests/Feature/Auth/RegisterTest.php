<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function testRegisterUser(): void
    {
        $response = $this->post(route('register'), [
            'first_name' => 'sample name',
            'last_name' => 'sample last name',
            'email' => 'sample-email@gmail.com',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ]);

        $response->assertStatus(201);
    }

    public function testRegisterWithWrongEmail()
    {
        $response = $this->post(route('register'), [
            'first_name' => 'sample name',
            'last_name' => 'sample last name',
            'email' => 'sample-emailgmail.com',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ]);

        $response->assertStatus(302);
    }

    public function testRegisterWhenPasswordAndPasswordConfirmationIsNotSame()
    {
        $response = $this->post(route('register'), [
            'first_name' => 'sample name',
            'last_name' => 'sample last name',
            'email' => 'sample-email@gmail.com',
            'password' => '123456789',
            'password_confirmation' => '12345678',
        ]);

        $response->assertStatus(302);
    }
}
