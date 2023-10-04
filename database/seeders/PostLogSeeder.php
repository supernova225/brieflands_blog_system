<?php

namespace Database\Seeders;

use App\Models\PostLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostLog::factory()->count(600)->create();
    }
}
