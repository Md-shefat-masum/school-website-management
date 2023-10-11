<?php

namespace Database\Seeders;

use App\Models\Blog\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::truncate();
        Blog::create([
            "blog_categories_id" =>  1,
            "title" => "Future of ICT",
            "image" => "frontend/assets/images/blog_img/img2.jpg",
            "short_description" => "The future of ICT is dynamic and ever-evolving, with these trends and innovations shaping the way we communicate, work, and live. It's important for individuals and organizations to stay informed and adapt to these changes to remain competitive and make the most of the opportunities presented by the evolving ICT landscape.",
            "description" => "The future of ICT is dynamic and ever-evolving, with these trends and innovations shaping the way we communicate, work, and live. It's important for individuals and organizations to stay informed and adapt to these changes to remain competitive and make the most of the opportunities presented by the evolving ICT landscape."
        ]);
        Blog::create([
            "blog_categories_id" =>  2,
            "title" => "Technology of educational tools",
            "image" => "frontend/assets/images/blog_img/img2.jpg",
            "short_description" => "The future of ICT is dynamic and ever-evolving, with these trends and innovations shaping the way we communicate, work, and live. It's important for individuals and organizations to stay informed and adapt to these changes to remain competitive and make the most of the opportunities presented by the evolving ICT landscape.",
            "short_description" => "The future of ICT is dynamic and ever-evolving, with these trends and innovations shaping the way we communicate, work, and live. It's important for individuals and organizations to stay informed and adapt to these changes to remain competitive and make the most of the opportunities presented by the evolving ICT landscape.",
            "description" => " educational technology tools and providing tutorials on how to use them effectively in the classroom. You can also discuss the latest trends in EdTech and offer recommendations for digital resources."
        ]);
        Blog::create([
            "blog_categories_id" =>  3,
            "title" => "Student Success and Well-being",
            "image" => "frontend/assets/images/blog_img/img2.jpg",
            "short_description" => "The future of ICT is dynamic and ever-evolving, with these trends and innovations shaping the way we communicate, work, and live. It's important for individuals and organizations to stay informed and adapt to these changes to remain competitive and make the most of the opportunities presented by the evolving ICT landscape.",
            "description" => " Blog posts in this category can offer valuable advice and tips to students on improving their study habits, time management skills, and overall academic success. Topics may include exam preparation, note-taking techniques, and managing academic stress."
        ]);
        Blog::create([
            "blog_categories_id" =>  4,
            "title" => "Career and College Guidance",
            "image" => "frontend/assets/images/blog_img/img2.jpg",
            "short_description" => "The future of ICT is dynamic and ever-evolving, with these trends and innovations shaping the way we communicate, work, and live. It's important for individuals and organizations to stay informed and adapt to these changes to remain competitive and make the most of the opportunities presented by the evolving ICT landscape.",
            "description" => "This category can cater to parents and caregivers looking for guidance on supporting their children's education. You can discuss topics such as effective parent-teacher communication, helping with homework, and fostering a love for learning at home."
        ]);
        Blog::create([
            "blog_categories_id" =>  5,
            "title" => "Education Policy and Advocacy",
            "image" => "frontend/assets/images/blog_img/img2.jpg",
            "short_description" => "The future of ICT is dynamic and ever-evolving, with these trends and innovations shaping the way we communicate, work, and live. It's important for individuals and organizations to stay informed and adapt to these changes to remain competitive and make the most of the opportunities presented by the evolving ICT landscape.",
            "description" => " Here, you can explore current educational policies, reforms, and trends, providing analysis and insights into their impact on schools, teachers, and students. This category can also cover discussions on educational equity and inclusion."
        ]);
    }
}
