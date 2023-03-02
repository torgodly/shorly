<?php

namespace Database\Seeders;

use App\Models\Heading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Heading::create([
            'title' => fake()->text(30),
            'description' => fake()->text(70),
            'user_id' => 1
        ]);
    }
}
