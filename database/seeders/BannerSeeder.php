<?php

namespace Database\Seeders;

use App\Models\WebsiteSection\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            "background" => "/assets/images/banner_image/bg2.jpg",
            "title" => "শিক্ষা প্রতিষ্ঠান মেধা ও প্রতিভা বিকাশের অন্যতম স্থান",
            "button_text" => "আবেদন করুন",
            "button_url" => "#",
            "breaking_news" => "বৃত্তি নিয়ে বিদেশে উচ্চশিক্ষার প্রক্রিয়া বেশ দীর্ঘ। তাড়াহুড়া করলে সুযোগ পাওয়ার সম্ভাবনা কমে যাবে। একদিকে যেমন পড়াশোনার প্রস্তুতির প্রয়োজন, অন্যদিকে কাগজপত্র ও প্রক্রিয়াসংশ্লিষ্ট নানা বিষয়ও কম গুরুত্বপূর্ণ নায়।
            ",
        ]);
    }
}
