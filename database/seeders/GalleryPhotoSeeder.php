<?php

namespace Database\Seeders;

use App\Models\Gallery\GalleryPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GalleryPhoto::create([
            "gallery_photo_categories_id" => 1,
            "title" => "asdf",
            "link" => "#"
        ]);
    }
}
