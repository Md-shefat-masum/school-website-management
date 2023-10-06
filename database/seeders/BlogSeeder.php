<?php

namespace Database\Seeders;

use App\Models\Blog\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::truncate();
        Blog::create([
            "blog_categories_id" =>  1,
            "title" => "Future of ICT",
            "image" => "",
            "description" => ""
        ]);
    }
}
