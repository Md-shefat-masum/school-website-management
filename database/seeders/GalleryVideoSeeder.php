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
            "title" => "বাংলাদেশের জাতীয় চিড়িয়াখানায় শিক্ষা সফর",
            "link" => '<iframe width="702" height="395" src="https://www.youtube.com/embed/e5Hc2B50Z7c" title="Education of School Intro Video for No Copyright free download" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'
        ]);
        GalleryVideo::create([
            "gallery_video_categories_id" => 2,
            "title" => "স্কুলে বার্ষিক ক্রীড়া প্রতিযোগিতা",
            "link" => '<iframe width="702" height="395" src="https://www.youtube.com/embed/easlg8-aeeA" title="Education Tech Logo Intro Animation 2022 | Logo intro No Copyright | Logo Intro Without Text" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'
        ]);
        GalleryVideo::create([
            "gallery_video_categories_id" => 3,
            "title" => "বৃক্ষরোপণ কর্মসূচির একাংশ",
            "link" => '<iframe width="702" height="395" src="https://www.youtube.com/embed/easlg8-aeeA" title="Education Tech Logo Intro Animation 2022 | Logo intro No Copyright | Logo Intro Without Text" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'
        ]);
    }
}
