<?php

namespace Database\Seeders;

use App\Models\Messenger;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Messenger::create([
            'name' => 'messenger',
            'value' => 'torgodly',
            'user_id' => 1
        ]);
    }
}
