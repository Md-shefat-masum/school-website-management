<?php

namespace Database\Seeders;

use App\Models\Academic\AcademicClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademyCalssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicClass::truncate();
        AcademicClass::create([
            "title" => " Class One",
        ]);
    }
}
