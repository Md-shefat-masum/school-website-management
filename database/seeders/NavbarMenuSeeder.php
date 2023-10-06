<?php

namespace Database\Seeders;

use App\Models\Navbar\NavbarMenu;
use App\Models\Navbar\NavbarMenuDetail;
use App\Models\Navbar\NavbarMenuItem;
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
                'title' => 'ক্যাম্পাস',
                'icon_image' => 'frontend/assets/images/all_index-area_image/school.png',
                "childrens" => [
                    [
                        "title" => "আমাদের সম্পর্কে",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>            "ইতিহাস",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>       "লক্ষ্য ও উদ্দেশ্য",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>   "প্রাতিষ্ঠানিক কাঠামো",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" => "প্রাতিষ্ঠানিক অবকাঠামো",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" => "শুদ্ধাচার সংক্রান্ত তথ্য",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                ],
            ],

            [
                "title" => 'ভর্তি',
                "icon_image" => 'frontend/assets/images/all_index-area_image/agreement.png',
                "childrens" => [
                    [
                        "title" =>  "কিভাবে আবেদন করতে হবে ?",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>  "ভর্তি পরীক্ষা",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>   "ভর্তি নীতি",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>   "রেজিস্ট্রেশন সিস্টেম",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>    "বর্তমান শিক্ষা ব্যবস্থা",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],

                    [
                        "title" =>   "সেমিস্টার পরিকল্পনা",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                ],
            ],

            [
                "title" => 'একাডেমিক প্রশাসন ',
                "icon_image" => 'frontend/assets/images/all_index-area_image/graduate.png',
                "childrens" => [
                    [
                        "title" =>     "প্রতিষ্ঠাতা",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 1,
                        "external_link" => "/employee/creator",
                    ],
                    [
                        "title" =>       "অধ্যক্ষ",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 1,
                        "external_link" => "/employee/principal",
                    ],
                    [
                        "title" =>      "উপাধ্যক্ষ",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 1,
                        "external_link" => "/employee/vice-principal",
                    ],
                    [
                        "title" =>   "শিক্ষক",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 1,
                        "external_link" => "/employee/teacher",
                    ],
                    [
                        "title" =>   "অফিস",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 1,
                        "external_link" => "/employee/office",
                    ],
                    [
                        "title" => "কর্মচারী",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 1,
                        "external_link" => "/employee/workers",
                    ],

                ],
            ],

            [
                "title" => 'একাডেমিক',
                "icon_image" => 'frontend/assets/images/all_index-area_image/academic.png',
                "childrens" => [
                    [
                        "title" =>  "শ্রেণি সূচি",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" => "অনলাইন শ্রেণি সূচি",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" => "পরীক্ষার সময়সূচী",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" => "একাডেমিক সিলেবাস",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>  "শিক্ষা বর্ষপঞ্জি",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" => "একাডেমিক প্রসপেক্টাস",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                ],
            ],

            [
                "title" => 'শিক্ষার্থী',
                "icon_image" => 'frontend/assets/images/all_index-area_image/student.png',
                "childrens" => [

                    [
                        "title" => "শিক্ষার্থীদের বেতন",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" => "শিক্ষার্থীদের ইউনিফর্ম",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>  "পরীক্ষার ব্যবস্থা",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" => "নিয়ম এবং প্রবিধান",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>  "আমাদের ছাত্র-ছাত্রী",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 1,
                        "external_link" => "/students"
                    ],
                    [
                        "title" =>  "শিক্ষার্থীদের সাফল্যের গল্প",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 1,
                        "external_link" => "/success-story"
                    ],
                ],
            ],
            [
                "title" => 'ফলাফল',
                "icon_image" => 'frontend/assets/images/all_index-area_image/gpa.png',
                "childrens" => [
                    [
                        "title" =>  "একাডেমিক পরীক্ষার ফলাফল",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 1,
                        "external_link" => "/academic-result"
                    ],
                    [
                        "title" =>   "বোর্ড পরীক্ষার ফলাফল",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 1,
                        "external_link" => "/board-result"
                    ],
                ],
            ],
            [
                "title" => 'নোটিশ',
                "icon_image" => 'frontend/assets/images/all_index-area_image/board.png',
                "childrens" => [
                    [
                        "title" =>   "ভর্তি নোটিশ",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],

                    [
                        "title" =>   "পরীক্ষার নোটিশ",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>    "ফলাফলের নোটিশ",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>    "ইভেন্টস নোটিশ",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>    "প্রশাসন নোটিশ",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                    [
                        "title" =>   "জাতীয় কর্মসূচি",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => "description"
                    ],
                ],
            ],
            [
                "title" => 'কোর্স সমূহ',
                "icon_image" => 'frontend/assets/images/all_index-area_image/online-course.png',
                "childrens" => [
                    [
                        "title" => "কিন্ডার গার্টেন",
                        "description" => "description"
                    ],
                    [
                        "title" => "প্রাথমিক",
                        "description" => "description"
                    ],
                    [
                        "title" => "ষষ্ঠ - দশম",
                        "description" => "description"
                    ],
                    [
                        "title" => "একাদশ - দ্বাদশ",
                        "description" => "description"
                    ],
                    // [
                    //     "title" => "ডিগ্রী",
                    // ],
                    // [
                    //     "title" => "অনার্স",
                    // ],
                ]
            ],
            [
                "title" => 'বৃত্তি ও উপবৃত্তি',
                "icon_image" => 'frontend/assets/images/all_index-area_image/loan.png',
                "childrens" => [
                    [
                        "title" =>  "বৃত্তি সংক্রান্ত নোটিশ",
                        "description" => "description"
                    ],
                    [
                        "title" =>  "উপবৃত্তি সংক্রান্ত নোটিশ",
                        "description" => "description"
                    ],
                ],
            ],
            [
                "title" => 'রিসোর্স',
                "icon_image" => 'frontend/assets/images/all_index-area_image/innovation.png',
                "childrens" => [
                    [
                        "title" =>  "ডিজিটাল ক্লাস কনটেন্ট",
                        "goto_external_link" => 1,
                        "external_link" => "/digital-class-content"
                    ],
                    [
                        "title" =>  "গ্রন্থাগার",
                        "goto_external_link" => 1,
                        "external_link" => "/library"
                    ],
                    [
                        "title" =>  "গবেষণাগার",
                        "goto_external_link" => 1,
                        "external_link" => "/lab"
                    ],
                    [
                        "title" =>  "খেলার মাঠ",
                        "goto_external_link" => 1,
                        "external_link" => "/playground"
                    ],
                    [
                        "title" =>  "সহ-পাঠক্রম সংক্রান্ত কার্যক্রম",
                        "description" => "description",
                        "goto_external_link" => 1,
                        "external_link" => "/co-curricular-activities"
                    ],
                ],
            ],
            [
                "title" => 'গ্যালারি',
                "icon_image" => 'frontend/assets/images/all_index-area_image/gallery.png',
                "childrens" => [
                    [
                        "title" =>  "ফটো গ্যালারী",
                        "goto_external_link" => 1,
                        "external_link" => "/gallery/photo"
                    ],
                    [
                        "title" =>  "ভিডিও গ্যালারী",
                        "goto_external_link" => 1,
                        "external_link" => "/gallery/video"
                    ],
                ],
            ],
            [
                "title" => 'সংবাদ',
                "icon_image" => 'frontend/assets/images/all_index-area_image/chat.png',
                "childrens" => [],
                "goto_external_link" => 1,
                "external_link" => "/news"
            ],
            [
                "title" => 'ব্লগ',
                "icon_image" => 'frontend/assets/images/all_index-area_image/chat.png',
                "childrens" => [],
                "goto_external_link" => 1,
                "external_link" => "/blog"
            ],
            [
                "title" => 'যোগাযোগ',
                "icon_image" => 'frontend/assets/images/all_index-area_image/chat.png',
                "childrens" => [],
                "goto_external_link" => 1,
                "external_link" => "/contact"
            ],
        ];

        NavbarMenu::truncate();
        NavbarMenuItem::truncate();
        NavbarMenuDetail::truncate();
        foreach ($menu as $key => $item) {
            $menu = NavbarMenu::create([
                "title" => $item['title'],
                "icon_image" => $item['icon_image'],
                "is_visible" => true,
                "serial" => $key + 1,
                "goto_external_link" => $item["goto_external_link"] ?? 0,
                "external_link" => $item["external_link"] ?? "",
            ]);

            if (isset($item["description"])) {
                NavbarMenuDetail::create([
                    "navbar_menu_id" => $menu->id,
                    "navbar_menu_items_id" => null,
                    "title" => $item['title'],
                    "description" => $item["description"],
                ]);
            }

            foreach ($item["childrens"] as $sub_key => $sub_item) {
                $menu_item = NavbarMenuItem::create([
                    "navbar_menus_id" => $menu->id,
                    "title" => $sub_item["title"],
                    "serial" => $sub_key + 1,
                    "goto_external_link" => $sub_item["goto_external_link"] ?? 0,
                    "external_link" => $sub_item["external_link"] ?? "",
                    "is_visible" => true,
                ]);

                if (isset($sub_item["description"])) {
                    NavbarMenuDetail::create([
                        "navbar_menu_id" => $menu->id,
                        "navbar_menu_items_id" => $menu_item->id,
                        "title" => $sub_item["title"],
                        "description" => $sub_item["description"],
                    ]);
                }
            }
        }
    }
}
