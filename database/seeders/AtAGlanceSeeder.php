<?php

namespace Database\Seeders;

use App\Models\WebsiteSection\AtAGlance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtAGlanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AtAGlance::truncate();
        AtAGlance::create([
            "title" => "টোটাল A+ পেয়েছে",
            "description" => "২৩ জন"
        ]);
        AtAGlance::create([
            "title" => "বিজ্ঞান থেকে A+ পেয়েছে",
            "description" => "১৫ জন"
        ]);
        AtAGlance::create([
            "title" => "মানবিক থেকে A+ পেয়েছে",
            "description" => "৮ জন"
        ]);
        AtAGlance::create([
            "title" => "টোটাল হাফেজ হয়েছে",
            "description" => "৩০ জন"
        ]);
    }
}
