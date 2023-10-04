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
        NavbarMenu::create([
            "title" => "ক্যাম্পাস",
            "icon_image" => "",
            "is_visible" => true,
            "serial" => true,
        ]);
        NavbarMenu::create([
            "title" => "একাডেমিক প্রশাসন ",
            "icon_image" => "",
            "is_visible" => true,
            "serial" => true,
        ]);
    }
}
