<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'mehdi',
            'last_name' => 'mahdavi',
            'email' => 'mehdi.mahdavi885@gmail.com',
            'password' => '123456789',
            'email_verified_at' => now(),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'first_name' => 'mehdi',
            'last_name' => 'mahdavi',
            'email' => 'mehdi.mahdavi8216@gmail.com',
            'password' => '123456789',
            'email_verified_at' => now(),
            'role' => 'user',
            'remember_token' => Str::random(10),
        ]);

        User::factory(20)->create();
    }
}
