<?php

namespace Database\Seeders;

use App\Models\Navbar\NavbarMenu;
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
        /**
         * donot randomize this order accordng to menu
         */
        $submenu = [
            [
                [
                    "title" => "আমাদের সম্পর্কে",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>            "ইতিহাস",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>       "লক্ষ্য ও উদ্দেশ্য",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>   "প্রাতিষ্ঠানিক কাঠামো",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" => "প্রাতিষ্ঠানিক অবকাঠামো",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" => "শুদ্ধাচার সংক্রান্ত তথ্য",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
            ],
            [
                [
                    "title" =>  "কিভাবে আবেদন করতে হবে ?",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>  "ভর্তি পরীক্ষা",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>   "ভর্তি নীতি",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>   "রেজিস্ট্রেশন সিস্টেম",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>    "বর্তমান শিক্ষা ব্যবস্থা",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],

                [
                    "title" =>   "সেমিস্টার পরিকল্পনা",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
            ],
            [
                [
                    "title" =>     "প্রতিষ্ঠাতা",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>       "অধ্যক্ষ",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>      "উপাধ্যক্ষ",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>   "শিক্ষক",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>   "অফিস",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" => "কর্মচারী",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],

            ],
            [
                [
                    "title" =>  "শ্রেণি সূচি",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" => "অনলাইন শ্রেণি সূচি",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" => "পরীক্ষার সময়সূচী",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" => "একাডেমিক সিলেবাস",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>  "শিক্ষা বর্ষপঞ্জি",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" => "একাডেমিক প্রসপেক্টাস",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
            ],
            [

                [
                    "title" => "শিক্ষার্থীদের বেতন",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" => "শিক্ষার্থীদের ইউনিফর্ম",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>  "পরীক্ষার ব্যবস্থা",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" => "নিয়ম এবং প্রবিধান",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>  "আমাদের ছাত্র-ছাত্রী",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>  "শিক্ষার্থীদের সাফল্যের গল্প",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
            ],
            [
                [
                    "title" =>  "একাডেমিক পরীক্ষার ফলাফল",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>   "বোর্ড পরীক্ষার ফলাফল",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
            ],
            [
                [
                    "title" =>   "ভর্তি নোটিশ",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],

                [
                    "title" =>   "পরীক্ষার নোটিশ",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>    "ফলাফলের নোটিশ",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>    "ইভেন্টস নোটিশ",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>    "প্রশাসন নোটিশ",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
                [
                    "title" =>   "জাতীয় কর্মসূচি",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                ],
            ],
            [

                [
                    "title" =>    "কোর্স সমূহ",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                    "child" => [
                        "কিন্ডার গার্টেন",
                        "প্রাথমিক",
                        "ষষ্ঠ - দশম",
                        "একাদশ - দ্বাদশ",
                        "ডিগ্রী",
                        "অনার্স",
                    ]

                ],
                [
                    "title" =>    "বৃত্তি ও উপবৃত্তি",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                    "child" => [
                        "বৃত্তি সংক্রান্ত নোটিশ",
                        "উপবৃত্তি সংক্রান্ত নোটিশ",
                    ]
                ],
                [
                    "title" =>      "রিসোর্স",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                    "child" => [
                        "ডিজিটাল ক্লাস কনটেন্ট",
                        "গ্রন্থাগার",
                        "গবেষণাগার",
                        "খেলার মাঠ",
                        "সহ-পাঠক্রম সংক্রান্ত কার্যক্রম",
                    ]
                ],
                [
                    "title" =>    "গ্যালারি",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                    "child" => [
                        "ফটো গ্যালারী",
                        "ভিডিও গ্যালারী",
                    ]
                ],
                [
                    "title" =>    "যোগাযোগ",
                    "serial" => "",
                    "is_visible" => true,
                    "goto_external_link" => 0,
                    "child" => [
                        "সংবাদ",
                        "ব্লগ",
                    ]
                ],

            ]

        ];

        // NavbarMenuItem::truncate();
        // foreach ($submenu as $index => $menu) {
        //     $id = $index + 1;
        //     foreach ($menu as $key => $item) {
        //         NavbarMenuItem::create([
        //             "navbar_menus_id" => $id,
        //             "title" => $item['name'],
        //             "serial" => $key + 1,
        //             "is_visible" => $item['is_visible'],
        //             "goto_external_link" => $item['goto_external_link'],
        //         ]);
        //     }
        // }
    }
}
