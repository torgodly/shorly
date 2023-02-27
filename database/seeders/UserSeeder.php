<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'name' => 'Abdullah',
           'username' => 'torgodly',
           'email' => 'admin@admin.com',
           'password' => bcrypt('password')
        ]);
    }
}
