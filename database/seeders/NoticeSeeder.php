<?php

namespace Database\Seeders;

use App\Models\Navbar\NavbarMenu;
use App\Models\Navbar\NavbarMenuDetail;
use App\Models\Navbar\NavbarMenuItem;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = NavbarMenu::where('title', 'নোটিশ')->first();
        if ($menu) {
            NavbarMenuDetail::where('navbar_menu_id', $menu->id)->delete();

            $submenus = NavbarMenuItem::where('navbar_menus_id', $menu->id)->get();
            foreach ($submenus as $submenu) {
                for ($i = 1; $i <= 3; $i++) {
                    NavbarMenuDetail::create([
                        "navbar_menu_id" => $menu->id,
                        "navbar_menu_items_id" => $submenu->id,
                        "title" => $submenu->title . ' ' . Carbon::parse("2023-0$i-10")->format('F y') ,
                        "description" => $submenu->title . ' ' . "বিস্তারিত",
                    ]);
                }
            }
        }
    }
}
