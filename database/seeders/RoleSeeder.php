<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();
        Role::create([
            "title" => "Super Admin",
            "serial_no" => 1,
        ]);
        Role::create([
            "title" => "Admin",
            "serial_no" => 2,
        ]);
        Role::create([
            "title" => "Student",
            "serial_no" => 3,
        ]);
        Role::create([
            "title" => "Subscriber",
            "serial_no" => 4,
        ]);
    }
}
