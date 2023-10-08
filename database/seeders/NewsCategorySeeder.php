<?php

namespace Database\Seeders;

use App\Models\News\NewsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsCategory::truncate();
        NewsCategory::create([
            "title" => "Academic Achievements"
        ]);
        NewsCategory::create([
            "title" => "Extracurricular Activities"
        ]);
        NewsCategory::create([
            "title" => "Faculty and Staff Updates"
        ]);
        NewsCategory::create([
            "title" => "School Events and Announcements"
        ]);
        NewsCategory::create([
            "title" => "Student Life and Well-being"
        ]);

    }
}
