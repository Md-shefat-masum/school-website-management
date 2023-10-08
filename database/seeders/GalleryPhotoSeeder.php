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
        GalleryPhoto::truncate();
        GalleryPhoto::create([
            "gallery_photo_categories_id" => 1,
            "title" => "",
            "image" => "frontend/assets/images/image_gallery/img1.jpg",
            "link" => "#"
        ]);
        GalleryPhoto::create([
            "gallery_photo_categories_id" => 2,
            "title" => "",
            "image" => "frontend/assets/images/image_gallery/img2.jpg",
            "link" => "#"
        ]);
        GalleryPhoto::create([
            "gallery_photo_categories_id" => 3,
            "title" => "",
            "image" => "frontend/assets/images/image_gallery/img3.jpg",
            "link" => "#"
        ]);
        GalleryPhoto::create([
            "gallery_photo_categories_id" => 4,
            "title" => "",
            "image" => "frontend/assets/images/image_gallery/img4.jpg",
            "link" => "#"
        ]);
        GalleryPhoto::create([
            "gallery_photo_categories_id" => 5,
            "title" => "",
            "image" => "frontend/assets/images/image_gallery/img5.jpg",
            "link" => "#"
        ]);
        GalleryPhoto::create([
            "gallery_photo_categories_id" => 6,
            "title" => "",
            "image" => "frontend/assets/images/image_gallery/img6.jpg",
            "link" => "#"
        ]);
    }
}
