<?php

namespace Database\Seeders;

use App\Models\Gallery\GalleryVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GalleryVideo::truncate();
        GalleryVideo::create([
            "gallery_video_categories_id" => 1,
            "title" => "asdf",
            "link" => "#"
        ]);
    }
}
