<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            "full_name" => "Super Admin",
            "email" => "superadmin@gmail.com",
            "password" => Hash::make('12345678'),
            "role_sl" => 1,
        ]);
        User::create([
            "full_name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make('12345678'),
            "role_sl" => 2,
        ]);

        User::create([
            "full_name" => "Subscriber",
            "email" => "subscriber@gmail.com",
            "password" => Hash::make('12345678'),
            "role_sl" => 4,
        ]);

        for ($i = 1; $i < 10; $i++) {
            User::create([
                "full_name" => "Student_$i",
                "email" => "student$i@gmail.com",
                "password" => Hash::make('12345678'),
                "role_sl" => 3,
            ]);
        }
    }
}
