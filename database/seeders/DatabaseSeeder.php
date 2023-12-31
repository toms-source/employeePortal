<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'email' => 'eugene@gmail.com',
            'role' => 'user',
            'first_name' => 'Eugene',
            'last_name' => 'Eugenio',
            'middle_name' => 'Dizon',
            'status' => 'Hired',
            'password' => bcrypt('password123'),
        ]);

        $this->call(UsersTableSeeder::class);  /// Eto yung mga fake data
    }
}
