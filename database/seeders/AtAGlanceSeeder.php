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
            "title" => "মোট ছাত্র ছাত্রী",
            "description" => "৪৮৬ জন"
        ]);
        AtAGlance::create([
            "title" => "মোট ছাত্রী",
            "description" => "১৯১ জন"
        ]);
        AtAGlance::create([
            "title" => "মোট ছাত্র",
            "description" => "২৯৫ জন"
        ]);
        AtAGlance::create([
            "title" => "শিক্ষক নিয়মিত",
            "description" => "১২ জন"
        ]);
        AtAGlance::create([
            "title" => "খন্ড কালীন",
            "description" => "৭  জন"
        ]);
        AtAGlance::create([
            "title" => "কর্মচারী",
            "description" => "৩ জন"
        ]);
    }
}
