<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Button;
use App\Models\Message;
use Database\Factories\PageFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Message::factory(20)->create();
            $this->call(UserSeeder::class);
//            $this->call(HeadingSeeder::class);
//            $this->call(MessengerSeeder::class);
//            Message::factory(20)->create();
            //call VisitsTableSeeder
//            $this->call(VisitsTableSeeder::class);
//            Button::factory(20)->create();
        //         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
