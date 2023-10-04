<?php

namespace Database\Seeders;

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
        GalleryPhotoCategory::create([
            "title" => "খেলাধুলা",
        ]);
    }
}
