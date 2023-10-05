<?php

namespace Database\Seeders;

use App\Models\Navbar\NavbarMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavbarMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $menu = [
            [
                'name' => 'ক্যাম্পাস',
                'image' => 'frontend/assets/images/all_index-area_image/school.png',
            ],

            [
                'name' => 'ভর্তি',
                'image' => 'frontend/assets/images/all_index-area_image/school.png',
            ],

            [
                'name' => 'একাডেমিক প্রশাসন ',
                'image' => 'frontend/assets/images/all_index-area_image/school.png',
            ],

            [
                'name' => 'একাডেমিক',
                'image' => 'frontend/assets/images/all_index-area_image/school.png',
            ],

            [
                'name' => 'শিক্ষার্থী',
                'image' => 'frontend/assets/images/all_index-area_image/school.png',
            ],
            [
                'name' => 'ফলাফল',
                'image' => 'frontend/assets/images/all_index-area_image/school.png',
            ],
            [
                'name' => 'নোটিশ',
                'image' => 'frontend/assets/images/all_index-area_image/school.png',
            ],
            [
                'name' => 'আরো দেখুন',
                'image' => 'frontend/assets/images/all_index-area_image/school.png',
            ],
        ];

        foreach ($menu as $item) {
            NavbarMenu::create([
                "title" => $item['name'],
                "icon_image" => $item['image'],
                "is_visible" => true,
                "serial" => true,
            ]);
        }
    }
}
