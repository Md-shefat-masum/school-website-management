<?php

namespace Database\Seeders;

use App\Models\Navbar\NavbarMenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavbarMenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NavbarMenuItem::create([
            "navbar_menus_id" => "1",
            "title" => "আমাদের সম্পর্কে",
            "serial" => true,
            "is_visible" => true,
            "goto_external_link" => true,
        ]);
    }
}
