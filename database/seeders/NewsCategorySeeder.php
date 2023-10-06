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
            "title" => "new academic routines"
        ]);
    }
}
