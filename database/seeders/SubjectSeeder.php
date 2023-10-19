<?php

namespace Database\Seeders;

use App\Models\Student\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = ['Bangla ', 'English', 'Math', 'Quran', 'Hadis', 'Fiqah'];
        Subject::truncate();
        for ($i = 1; $i <= 12; $i++) {
            foreach ($subjects as  $subject) {
                Subject::create([
                    "title" => $subject,
                    "student_class_id" => $i,
                ]);
            }
        }
    }
}
