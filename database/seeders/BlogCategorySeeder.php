<?php

namespace Database\Seeders;

use App\Models\Blog\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogCategory::truncate();
        BlogCategory::create([
            "title" => "Ict"
        ]);
        BlogCategory::create([
            "title" => "Parenting and Education"
        ]);
        BlogCategory::create([
            "title" => "Student Success"
        ]);
        BlogCategory::create([
            "title" => "Career "
        ]);
        BlogCategory::create([
            "title" => "Education"
        ]);
    }
}
