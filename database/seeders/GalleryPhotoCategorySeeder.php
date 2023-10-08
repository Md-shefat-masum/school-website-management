<?php

namespace Database\Seeders;

use App\Models\Gallery\GalleryPhoto;
use App\Models\Gallery\GalleryPhotoCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryPhotoCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GalleryPhotoCategory::truncate();
        GalleryPhotoCategory::create([
            "title" => "খেলাধুলা",
        ]);
        GalleryPhotoCategory::create([
            "title" => "ভ্রমণ",
        ]);
        GalleryPhotoCategory::create([
            "title" => " প্রতিষ্ঠাতা",
        ]);
        GalleryPhotoCategory::create([
            "title" => " ক্যাম্পাস ভ্রমণ",
        ]);
        GalleryPhotoCategory::create([
            "title" => "প্রধান শিক্ষক",
        ]);
        GalleryPhotoCategory::create([
            "title" => "প্রতিষ্ঠান",
        ]);
    }
}
