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
        /**
         * donot randomize this order accordng to menu
         */
        $submenu = [
            [
                [
                    "name" => "আমাদের সম্পর্কে",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>            "ইতিহাস",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>       "লক্ষ্য ও উদ্দেশ্য",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>   "প্রাতিষ্ঠানিক কাঠামো",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" => "প্রাতিষ্ঠানিক অবকাঠামো",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" => "শুদ্ধাচার সংক্রান্ত তথ্য",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
            ],
            [
                [
                    "name" =>  "কিভাবে আবেদন করতে হবে ?",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>  "ভর্তি পরীক্ষা",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>   "ভর্তি নীতি",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>   "রেজিস্ট্রেশন সিস্টেম",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>    "বর্তমান শিক্ষা ব্যবস্থা",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],

                [
                    "name" =>   "সেমিস্টার পরিকল্পনা",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
            ],
            [
                [
                    "name" =>     "প্রতিষ্ঠাতা",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>       "অধ্যক্ষ",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>      "উপাধ্যক্ষ",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>   "শিক্ষক",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>   "অফিস",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" => "কর্মচারী",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],

            ],
            [
                [
                    "name" =>  "শ্রেণি সূচি",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" => "অনলাইন শ্রেণি সূচি",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" => "পরীক্ষার সময়সূচী",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" => "একাডেমিক সিলেবাস",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>  "শিক্ষা বর্ষপঞ্জি",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" => "একাডেমিক প্রসপেক্টাস",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
            ],
            [

                [
                    "name" => "শিক্ষার্থীদের বেতন",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" => "শিক্ষার্থীদের ইউনিফর্ম",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>  "পরীক্ষার ব্যবস্থা",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" => "নিয়ম এবং প্রবিধান",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>  "আমাদের ছাত্র-ছাত্রী",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>  "শিক্ষার্থীদের সাফল্যের গল্প",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
            ],
            [
                [
                    "name" =>  "একাডেমিক পরীক্ষার ফলাফল",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>   "বোর্ড পরীক্ষার ফলাফল",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
            ],
            [
                [
                    "name" =>   "ভর্তি নোটিশ",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],

                [
                    "name" =>   "পরীক্ষার নোটিশ",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>    "ফলাফলের নোটিশ",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>    "ইভেন্টস নোটিশ",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>    "প্রশাসন নোটিশ",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
                [
                    "name" =>   "জাতীয় কর্মসূচি",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                ],
            ],
            [

                [
                    "name" =>    "কোর্স সমূহ",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
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
                    "name" =>    "বৃত্তি ও উপবৃত্তি",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                    "child" => [
                        "বৃত্তি সংক্রান্ত নোটিশ",
                        "উপবৃত্তি সংক্রান্ত নোটিশ",
                    ]
                ],
                [
                    "name" =>      "রিসোর্স",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                    "child" => [
                        "ডিজিটাল ক্লাস কনটেন্ট",
                        "গ্রন্থাগার",
                        "গবেষণাগার",
                        "খেলার মাঠ",
                        "সহ-পাঠক্রম সংক্রান্ত কার্যক্রম",
                    ]
                ],
                [
                    "name" =>    "গ্যালারি",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                    "child" => [
                        "ফটো গ্যালারী",
                        "ভিডিও গ্যালারী",
                    ]
                ],
                [
                    "name" =>    "যোগাযোগ",
                    "serial" => true,
                    "is_visible" => true,
                    "goto_external_link" => true,
                    "child" => [
                        "সংবাদ",
                        "ব্লগ",
                    ]
                ],

            ]

        ];


        foreach ($submenu as $index => $menu) {
            $id = $index + 1;
            foreach ($menu as $item) {
                NavbarMenuItem::create([
                    "navbar_menus_id" => $id,
                    "title" => $item['name'],
                    "serial" => $item['serial'],
                    "is_visible" => $item['is_visible'],
                    "goto_external_link" => $item['goto_external_link'],
                ]);
            }
        }
    }
}
