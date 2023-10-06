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
            "title" => "ict"
        ]);
    }
}
