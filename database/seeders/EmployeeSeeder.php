<?php

namespace Database\Seeders;

use App\Models\Employee\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::truncate();
        Employee::create([
            "employee_roles_id" =>  "2",
            "name" => "Md Ashraful Alam",
            "designation" => "Principal(Incharge)",
            "description" => "",
            "joining_date" => "10-10-05",
            "image" => "frontend/assets/images/avatar.png"
        ]);
        Employee::create([
            "employee_roles_id" =>  "4",
            "name" => "Md Masudur Rahman",
            "designation" => "Senior Teacher",
            "description" => "",
            "joining_date" => "10-10-05",
            "image" => "frontend/assets/images/avatar.png"
        ]);
        Employee::create([
            "employee_roles_id" =>  "4",
            "name" => "Md Hasem Mahmud",
            "designation" => "Senior Teacher",
            "description" => "",
            "joining_date" => "10-10-05",
            "image" => "frontend/assets/images/avatar.png"
        ]);
        Employee::create([
            "employee_roles_id" =>  "4",
            "name" => "Md Abdur Rob",
            "designation" => "Senior Teacher",
            "description" => "",
            "joining_date" => "10-10-05",
            "image" => "frontend/assets/images/avatar.png"
        ]);
        Employee::create([
            "employee_roles_id" =>  "4",
            "name" => "Md Sahid Ullah",
            "designation" => "Senior Teacher",
            "description" => "",
            "joining_date" => "10-10-05",
            "image" => "frontend/assets/images/avatar.png"
        ]);
        Employee::create([
            "employee_roles_id" =>  "4",
            "name" => "Md Jamal Hossain",
            "designation" => "Senior Teacher",
            "description" => "",
            "joining_date" => "10-10-05",
            "image" => "frontend/assets/images/avatar.png"
        ]);
        Employee::create([
            "employee_roles_id" =>  "4",
            "name" => "Md Sajahan",
            "designation" => "Senior Teacher",
            "description" => "",
            "joining_date" => "10-10-05",
            "image" => "frontend/assets/images/avatar.png"
        ]);
    }
}
