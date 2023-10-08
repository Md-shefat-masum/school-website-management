<?php

namespace Database\Seeders;

use App\Models\News\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::truncate();
        News::create([
            "news_category_id" => 1,
            "title" => "academic accomplishments",
            "description" => "This category covers news about students' academic accomplishments, including honors, awards, scholarships, and noteworthy academic achievements. It showcases the excellence of students in various subjects and fields.",
            "image" => "/assets/images/news_img/img1.jpg"
        ]);
        News::create([
            "news_category_id" => 2,
            "title" => "extracurricular programs",
            "description" => "This category covers news about students' academic accomplishments, including honors, awards, scholarships, and noteworthy academic achievements. It showcases the excellence of students in various subjects and fields.",
            "image" => "/assets/images/news_img/img2.jpg"
        ]);
        News::create([
            "news_category_id" => 3,
            "title" => "exceptional educators",
            "description" => "This category provides information about changes and developments among the school's faculty and staff, including new hires, retirements, promotions, and profiles of exceptional educators and staff members.",
            "image" => "/assets/images/news_img/img3.jpg"
        ]);
        News::create([
            "news_category_id" => 4,
            "title" => "announcements including parent-teacher conferences",
            "description" => "This category covers upcoming and past events, important dates, and announcements within the school, including parent-teacher conferences, open houses, fundraisers, and community outreach initiatives.",
            "image" => "/assets/images/news_img/img4.jpg"
        ]);
        News::create([
            "news_category_id" => 5,
            "title" => "mental health initiatives",
            "description" => "This category delves into the well-being of students and includes news related to student services, mental health initiatives, counseling programs, and stories highlighting the experiences and challenges faced by students in their daily lives.",
            "image" => "/assets/images/news_img/img5.jpg"
        ]);
    }
}
