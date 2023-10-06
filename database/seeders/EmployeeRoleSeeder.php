<?php

namespace Database\Seeders;

use App\Models\Employee\Employee;
use App\Models\Employee\EmployeeRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::truncate();
        EmployeeRole::create([
            "title" => "প্রতিষ্ঠাতা",
            "serial" => 1
        ]);
        EmployeeRole::create([
            "title" => "অধ্যক্ষ",
            "serial" => 1
        ]);
        EmployeeRole::create([
            "title" => "উপাধ্যক্ষ",
            "serial" => 1
        ]);
        EmployeeRole::create([
            "title" => "শিক্ষক",
            "serial" => 1
        ]);
        EmployeeRole::create([
            "title" => "অফিস",
            "serial" => 1
        ]);
        EmployeeRole::create([
            "title" => "কর্মচারী",
            "serial" => 1
        ]);
    }
}
