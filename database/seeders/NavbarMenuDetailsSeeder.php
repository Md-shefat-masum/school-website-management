<?php

namespace Database\Seeders;

use App\Models\Navbar\NavbarMenuDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavbarMenuDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NavbarMenuDetail::create([
            "navbar_menu_id" => 1,
            "navbar_menu_items_id" => 1,
            "navbar_menu_items_navbar_menus_id" => 1,
            "description" => "description"
        ]);
    }
}
