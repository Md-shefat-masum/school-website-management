<?php

namespace Database\Seeders;

use App\Models\Academic\AcademicClassSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademyCalssSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicClassSubject::create([
            "academy_classes_id" => 1,
            "teacher_id" => 1,
            "title" => "title",
        ]);
    }
}
