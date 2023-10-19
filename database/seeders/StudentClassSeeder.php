<?php

namespace Database\Seeders;

use App\Models\Student\StudentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentClass::truncate();
        for ($i = 1; $i <= 10; $i++) {
            StudentClass::create([
                "serial" => $i,
                "title" => numercToAlphabet($i)
            ]);
        }
        StudentClass::create([
            "serial" => 11,
            "title" => "Alim First Year"
        ]);
        StudentClass::create([
            "serial" => 12,
            "title" => "Alim Second Year"
        ]);
    }
}
