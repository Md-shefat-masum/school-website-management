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
            "employee_roles_id" =>  "1",
            "name" => "Md Lutfor Rahman",
            "designation" => "Principal",
            "description" => "",
            "joining_date" => "10-10-10"
        ]);
    }
}
