<?php

namespace Database\Seeders;

use App\Models\Gallery\GalleryVideoCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryVideoCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GalleryVideoCategory::truncate();
        GalleryVideoCategory::create([
            "title" => "one"
        ]);
    }
}
