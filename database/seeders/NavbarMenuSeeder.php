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
                        "description" => $this->about_us(),
                    ],
                    [
                        "title" =>            "ইতিহাস",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => $this->history(),
                    ],
                    [
                        "title" =>       "লক্ষ্য ও উদ্দেশ্য",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => $this->aim(),
                    ],
                    [
                        "title" =>   "প্রাতিষ্ঠানিক কাঠামো",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => $this->structure(),
                    ],
                    [
                        "title" => "প্রাতিষ্ঠানিক অবকাঠামো",
                        "serial" => "",
                        "is_visible" => true,
                        "goto_external_link" => 0,
                        "description" => $this->structure(),
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

    public function about_us()
    {
        $value =  '<p>মুরাদপুর ইসলামিয়া হাফেজিয়া মাদ্রাসা একটি শিক্ষা প্রতিষ্ঠান যা ঐতিহ্যগতভাবে ইসলামী শিক্ষা এবং ধর্মীয় শিক্ষার সাথে যুক্ত। মাদ্রাসা বিশ্বের বিভিন্ন স্থানে, বিশেষ করে মুসলিম সংখ্যাগরিষ্ঠ দেশগুলিতে পাওয়া যায়। এই প্রতিষ্ঠানগুলি শিক্ষার কেন্দ্র হিসাবে কাজ করে যেখানে ছাত্ররা, প্রায়ই "তালিব" হিসাবে পরিচিত, ইসলামিক অধ্যয়ন, আরবি ভাষা, কুরআন তেলাওয়াত এবং অন্যান্য সম্পর্কিত বিষয়ে নির্দেশনা পায়। মাদ্রাসাগুলোর লক্ষ্য ইসলাম, এর মূলনীতি এবং এর শিক্ষা সম্পর্কে একটি বিস্তৃত ধারণা প্রদান করা।</p> <p>ধর্মীয় শিক্ষার পাশাপাশি, কিছু মাদ্রাসা তাদের ছাত্রদের জন্য একটি সুষ্ঠু শিক্ষা নিশ্চিত করতে গণিত, বিজ্ঞান এবং ভাষার মতো ধর্মনিরপেক্ষ বিষয় অফার করে। মাদ্রাসাগুলো ইসলামী ঐতিহ্য সংরক্ষণ, ধর্মীয় মূল্যবোধের প্রচার এবং এক প্রজন্ম থেকে পরবর্তী প্রজন্মে জ্ঞান প্রেরণে গুরুত্বপূর্ণ ভূমিকা পালন করে। তারা এমন একটি স্থান হিসাবে কাজ করে যেখানে শিক্ষার্থীরা তাদের ধর্মীয় বোঝাপড়াকে গভীর করতে পারে, নৈতিক মূল্যবোধ গড়ে তুলতে পারে এবং তাদের বিশ্বাসের সাথে একটি শক্তিশালী সংযোগ গড়ে তুলতে পারে। মাদ্রাসাগুলিতে প্রায়শই একটি কাঠামোগত পাঠ্যক্রম, নিবেদিত শিক্ষক এবং একটি লালনপালন পরিবেশ থাকে যা আধ্যাত্মিক বৃদ্ধি এবং একাডেমিক বিকাশকে উৎসাহিত করে। যদিও নির্দিষ্ট অনুশীলন এবং পাঠ্যক্রম বিভিন্ন মাদ্রাসা জুড়ে পরিবর্তিত হতে পারে, তবে তাদের মৌলিক উদ্দেশ্য হল ব্যক্তিদের ধর্মীয় শিক্ষায় নিয়োজিত এবং ইসলামের সাথে তাদের সম্পর্ক জোরদার করার জন্য একটি প্ল্যাটফর্ম প্রদান করা।</p>';
        return $value;
    }

    public function history()
    {
        return "<p>মুরাদপুর ইসলামিয়া আলিম মাদ্রাসার ইতিহাস তার নম্র সূচনা থেকে শুরু করে। এটি একটি ছোট শিক্ষাকেন্দ্র হিসাবে শুরু হয়েছিল, যারা ইসলাম সম্পর্কে তাদের জ্ঞানকে আরও গভীর করার চেষ্টা করেছিল এমন কয়েকজন ছাত্রের জন্য। বছরের পর বছর ধরে, প্রতিষ্ঠাতা, শিক্ষক এবং সম্প্রদায়ের নিষ্ঠা ও কঠোর পরিশ্রমের কারণে, মাদ্রাসাটি আকার এবং সুনাম বৃদ্ধি পেয়েছে।</p> <p>এর সমগ্র ইতিহাস জুড়ে, আমাদের মাদ্রাসা ধর্মীয় শিক্ষা প্রদান, ইসলামী মূল্যবোধের প্রচার এবং এর ছাত্রদের আধ্যাত্মিক বৃদ্ধি লালন করার লক্ষ্যে অটল থেকেছে। মুরাদপুর ইসলামিয়া আলিম মাদ্রাসার পাঠ্যক্রমটি কুরআনিক অধ্যয়ন, হাদিস (ভবিষ্যদ্বাণীমূলক ঐতিহ্য), তাফসির (কুরআনের ব্যাখ্যা), ফিকাহ (ইসলামী আইনশাস্ত্র) এবং আরবি ভাষা সহ বিস্তৃত বিষয় কভার করে।</p>
        <p>সময়ের সাথে সাথে, মাদ্রাসা একটি অনুকূল শিক্ষার পরিবেশ প্রদানের জন্য তার সুযোগ-সুবিধা এবং সংস্থানগুলিকে প্রসারিত করেছে। এটি এখন সুসজ্জিত শ্রেণীকক্ষ, ইসলামী সাহিত্যের বিশাল সংগ্রহ সহ একটি লাইব্রেরি, প্রতিদিনের প্রার্থনা এবং মণ্ডলীর উপাসনার জন্য একটি মসজিদ এবং দূরবর্তী অঞ্চল থেকে এখানে পড়াশোনা করতে আসা শিক্ষার্থীদের জন্য থাকার ব্যবস্থা রয়েছে।</p>
        <p>আমাদের মাদ্রাসার ইতিহাসের একটি উল্লেখযোগ্য দিক হলো একাডেমিক উৎকর্ষতা ও চরিত্র বিকাশের ওপর জোর দেওয়া। নিবেদিতপ্রাণ এবং জ্ঞানী শিক্ষকরা ছাত্রদের মধ্যে শৃঙ্খলা, সততা এবং সহানুভূতির বোধ জাগিয়ে তোলার চেষ্টা করেন, তাদের লালন-পালন করেন যাতে তারা সমাজে ইতিবাচকভাবে অবদান রাখতে পারে।</p>
        <p>তার পুরো যাত্রায়, মুরাদপুর ইসলামিয়া আলিম মাদ্রাসা অসংখ্য আলেম, ইমাম এবং ধর্মীয় নেতা তৈরি করেছে যারা তাদের সম্প্রদায়ের সেবা এবং ইসলামের শিক্ষা প্রচার করে চলেছে। মাদ্রাসাটি সক্রিয়ভাবে কমিউনিটি আউটরিচ প্রোগ্রাম, ধর্মীয় অনুষ্ঠান আয়োজন এবং সুবিধাবঞ্চিত শিক্ষার্থীদের শিক্ষাগত সহায়তা প্রদানে জড়িত।</p>
        <p>এই সম্মানিত প্রতিষ্ঠানের একজন ছাত্র হিসাবে, আমি এর ইতিহাস এবং উত্তরাধিকারের অংশ হতে পেরে সৌভাগ্যবান বোধ করছি। আমি নিবেদিতপ্রাণ শিক্ষকদের কাছ থেকে শেখার, অর্থপূর্ণ আলোচনায় যুক্ত হওয়ার এবং ইসলাম সম্পর্কে আমার উপলব্ধি গভীর করার সুযোগের জন্য কৃতজ্ঞ। মুরাদপুর ইসলামিয়া আলিম মাদ্রাসা তার ছাত্রদের জীবনকে অনুপ্রাণিত করে এবং গঠন করে চলেছে, শুধুমাত্র জ্ঞানই নয়, বিশ্বাসের মূলে থাকা জীবনের অবিচ্ছেদ্য মূল্যবোধ ও গুণাবলীও প্রদান করছে।</p>";
    }

    public function aim()
    {
        return "<p>মুরাদপুর ইসলামিয়া আলিম মাদ্রাসার লক্ষ্য হল একটি ব্যাপক ইসলামী শিক্ষা প্রদান করা যা ছাত্রদেরকে ইসলামের নীতি, শিক্ষা এবং মূল্যবোধের গভীর উপলব্ধির সাথে সজ্জিত করে। আমাদের মাদ্রাসা নিম্নলিখিত উদ্দেশ্যগুলি পূরণ করতে সচেষ্ট:</p>
        <p>ধর্মীয় জ্ঞান: প্রাথমিক লক্ষ্য হল কুরআনিক অধ্যয়ন, হাদিস, তাফসির, ফিকাহ এবং ইসলামী বিজ্ঞানের অন্যান্য ক্ষেত্র সহ ইসলামী জ্ঞানের একটি শক্তিশালী ভিত্তি প্রদান করা। আমাদের লক্ষ্য শিক্ষার্থীদেরকে কুরআন ও সুন্নাহ সম্পর্কে গভীর উপলব্ধি গড়ে তুলতে সাহায্য করা, তাদের দৈনন্দিন জীবনে ইসলামী শিক্ষা প্রয়োগ করতে সক্ষম করা।</p>
        <p>চারিত্রিক বিকাশ: আমাদের মাদ্রাসা ছাত্রদের চরিত্র গঠনের উপর অনেক জোর দেয়। আমরা নৈতিক মূল্যবোধ, নৈতিকতা, সমবেদনা এবং সততা জাগিয়ে তোলার লক্ষ্য রাখি, দায়িত্বশীল এবং ন্যায়পরায়ণ ব্যক্তিদের বিকাশকে উৎসাহিত করা যারা তাদের পরিবার, সম্প্রদায় এবং সমাজে ব্যাপকভাবে ইতিবাচকভাবে অবদান রাখে।</p>
        <p>আরবি ভাষার দক্ষতা: আরবি কুরআনের ভাষা এবং ইসলামিক অধ্যয়নের ক্ষেত্রে অত্যন্ত গুরুত্ব বহন করে। আমরা শিক্ষার্থীদের আরবি ভাষায় দক্ষতার বিকাশ ঘটাতে চাই, যাতে তারা সঠিক ও গভীরতার সাথে ইসলামী পাঠ্য পড়তে, বুঝতে এবং ব্যাখ্যা করতে সক্ষম হয়।</p>
        <p>ইসলামী ঐতিহ্যের সংরক্ষণ: আমরা সমৃদ্ধ ইসলামী ঐতিহ্য ও ঐতিহ্য সংরক্ষণ ও প্রচার করার চেষ্টা করি, যাতে ছাত্রদের ইসলামী ইতিহাস, সংস্কৃতি এবং সভ্যতা সম্পর্কে ব্যাপক ধারণা থাকে। এর মধ্যে রয়েছে নবী মুহাম্মদ (সা.) এবং ইসলামের ইতিহাসের অন্যান্য উল্লেখযোগ্য ব্যক্তিত্বের জীবন অধ্যয়ন।</p>
        <p>কমিউনিটি সার্ভিস: আমাদের মাদ্রাসা ছাত্রদের সক্রিয়ভাবে কমিউনিটি সার্ভিস এবং আউটরিচ প্রোগ্রামে জড়িত হতে উৎসাহিত করে। সমাজের উপকার করে এমন ক্রিয়াকলাপে অংশগ্রহণ করার মাধ্যমে, শিক্ষার্থীরা সামাজিক দায়িত্ববোধের বিকাশ ঘটায় এবং অন্যদের সেবা করার গুরুত্ব শিখে।</p>
        <p>একাডেমিক উৎকর্ষতা: ধর্মীয় শিক্ষার পাশাপাশি, আমরা গণিত, বিজ্ঞান এবং ভাষার মতো বিষয়গুলি অন্তর্ভুক্ত করে এমন একটি সুসংহত শিক্ষা প্রদানের লক্ষ্য রাখি। আমরা শিক্ষার্থীদের মেধা বৃদ্ধিতে এবং অধ্যয়নের বিভিন্ন ক্ষেত্রে একাডেমিক সাফল্যের জন্য তাদের প্রস্তুত করতে বিশ্বাস করি।</p>
        <p>আন্তঃধর্মীয় বোঝাপড়া: একটি ক্রমবর্ধমান আন্তঃসংযুক্ত বিশ্বে, আমাদের মাদ্রাসা আন্তঃধর্মীয় সংলাপ এবং বোঝাপড়ার প্রচার করে। আমরা এমন একটি পরিবেশ গড়ে তোলার লক্ষ্য রাখি যেখানে শিক্ষার্থীরা অন্যান্য ধর্ম সম্পর্কে শিখে, বিভিন্ন বিশ্বাসকে সম্মান করে এবং বোঝাপড়া ও সম্প্রীতির সেতু নির্মাণে অবদান রাখে।</p>
        <p>সামগ্রিকভাবে, মুরাদপুর ইসলামিয়া আলিম মাদ্রাসার লক্ষ্য হল জ্ঞানী, সহানুভূতিশীল এবং সুগোল ব্যক্তি তৈরি করা যারা ইসলামী শিক্ষায় দৃঢ়ভাবে প্রতিষ্ঠিত, সমাজে ইতিবাচক অবদান রাখতে সজ্জিত এবং তাদের ব্যক্তিগত ও পেশাগতভাবে ইসলামের মূল্যবোধ সমুন্নত রাখতে প্রতিশ্রুতিবদ্ধ। জীবন</p>";
    }

    public function structure()
    {
        return "<p>মুরাদপুর ইসলামিয়া আলিম মাদ্রাসার কাঠামোটি একটি অনুকূল শিক্ষার পরিবেশ প্রদান এবং শিক্ষার্থীদের সামগ্রিক বিকাশের সুবিধার্থে ডিজাইন করা হয়েছে। এখানে আমাদের মাদ্রাসার কাঠামোর মূল উপাদানগুলির একটি সংক্ষিপ্ত বিবরণ রয়েছে:</p>
        <p>প্রশাসনিক সংস্থা: মাদ্রাসা একটি প্রশাসনিক সংস্থা দ্বারা পরিচালিত হয় যা আর্থিক ব্যবস্থাপনা, পাঠ্যক্রম পরিকল্পনা এবং নীতি বাস্তবায়ন সহ এর কার্যক্রম তত্ত্বাবধান করে। প্রশাসনিক সংস্থা অভিজ্ঞ ব্যক্তিদের নিয়ে গঠিত যারা মাদ্রাসার মসৃণ কার্যকারিতা নিশ্চিত করে।</p>
        <p>অধ্যক্ষ এবং শিক্ষক: মাদ্রাসার নেতৃত্বে একজন অধ্যক্ষ যিনি সামগ্রিক ব্যবস্থাপনা এবং একাডেমিক বিষয়গুলির জন্য দায়ী। অধ্যক্ষ যোগ্য এবং নিবেদিত শিক্ষকদের একটি দলের সাথে ঘনিষ্ঠভাবে কাজ করেন যারা ইসলামিক স্টাডিজের বিভিন্ন বিষয়ে বিশেষজ্ঞ। এই শিক্ষকরা পাঠ প্রদান করে, মূল্যায়ন পরিচালনা করে এবং শিক্ষার্থীদের নির্দেশনা ও সহায়তা প্রদান করে।</p>
        <p>একাডেমিক বিভাগ: মুরাদপুর ইসলামিয়া আলিম মাদ্রাসা বিভিন্ন একাডেমিক বিভাগ নিয়ে গঠিত, প্রতিটি ইসলামী শিক্ষার নির্দিষ্ট ক্ষেত্রগুলিতে ফোকাস করে। এই বিভাগে কুরআন অধ্যয়ন, হাদিস, তাফসির, ফিকাহ, আরবি ভাষা, ইসলামিক ইতিহাস এবং অন্যান্য অন্তর্ভুক্ত থাকতে পারে। প্রতিটি বিভাগের নেতৃত্বে অভিজ্ঞ ফ্যাকাল্টি সদস্য যারা নিজ নিজ ক্ষেত্রে বিশেষজ্ঞ।</p>
        <p>পাঠ্যক্রম: মাদ্রাসা একটি কাঠামোগত এবং ব্যাপক পাঠ্যক্রম অনুসরণ করে যা ইসলামিক অধ্যয়নের সাথে সম্পর্কিত বিস্তৃত বিষয়গুলিকে কভার করে। পাঠ্যক্রমটি একটি ভারসাম্যপূর্ণ শিক্ষা প্রদানের জন্য ডিজাইন করা হয়েছে, যাতে তাত্ত্বিক জ্ঞান এবং ইসলামী শিক্ষার ব্যবহারিক প্রয়োগ উভয়ই অন্তর্ভুক্ত করা হয়। এতে কুরআন, হাদিস, ইসলামী আইনশাস্ত্র, আরবি ভাষা এবং অন্যান্য প্রাসঙ্গিক বিষয়ের অধ্যয়ন অন্তর্ভুক্ত রয়েছে।</p>
        <p>শ্রেণীকক্ষ এবং সুবিধা: মাদ্রাসাটি সুসজ্জিত শ্রেণীকক্ষ প্রদান করে যেখানে শিক্ষার্থীরা তাদের পাঠে অংশগ্রহণ করে এবং আলোচনায় অংশগ্রহণ করে। এই শ্রেণীকক্ষগুলি কার্যকর শিক্ষণ এবং শেখার অভিজ্ঞতা সহজতর করার জন্য ডিজাইন করা হয়েছে। উপরন্তু, মাদ্রাসায় ছাত্রদের একাডেমিক ও আধ্যাত্মিক বৃদ্ধিতে সহায়তা করার জন্য প্রার্থনার জায়গা, ইসলামী সাহিত্যের সংগ্রহ সহ একটি লাইব্রেরি, কম্পিউটার ল্যাব এবং অন্যান্য সুবিধা থাকতে পারে।</p>
        <p>হোস্টেল থাকার ব্যবস্থা: দূরবর্তী এলাকা থেকে মাদ্রাসায় পড়তে আসা ছাত্রদের জন্য থাকার ব্যবস্থা করা হয়। ছাত্রাবাসগুলি প্রাঙ্গনে বা আশেপাশে উপলব্ধ, শিক্ষার্থীদের জন্য নিরাপদ এবং আরামদায়ক জীবনযাপনের পরিবেশ প্রদান করে। এই হোস্টেলগুলি সম্প্রদায়ের বোধ জাগিয়ে তোলে এবং ছাত্রদের আদান-প্রদান এবং একাডেমিক এবং আধ্যাত্মিক সাধনায় জড়িত থাকার জন্য একটি সহায়ক স্থান প্রদান করে।</p>
        <p>পাঠ্যক্রম বহির্ভূত কার্যক্রম: মুরাদপুর ইসলামিয়া আলিম মাদ্রাসা সামগ্রিক উন্নয়নের গুরুত্ব স্বীকার করে এবং একাডেমিক অধ্যয়নের পাশাপাশি বিভিন্ন পাঠক্রম বহির্ভূত কার্যক্রম অফার করে। এই ক্রিয়াকলাপগুলির মধ্যে খেলাধুলা, সাংস্কৃতিক অনুষ্ঠান, প্রতিযোগিতা, ধর্মীয় সমাবেশ এবং সম্প্রদায় পরিষেবা উদ্যোগ অন্তর্ভুক্ত থাকতে পারে। এই ধরনের ক্রিয়াকলাপ দলগত কাজ, নেতৃত্বের দক্ষতা এবং একটি সুগঠিত ব্যক্তিত্বকে উন্নীত করে।</p>
        <p>সম্প্রদায়ের সম্পৃক্ততা: মাদ্রাসা স্থানীয় সম্প্রদায়ের সাথে সক্রিয়ভাবে জড়িত, ধর্মীয় অনুষ্ঠান, সেমিনার এবং কর্মশালার আয়োজন করে যা সম্প্রদায়ের সদস্যদের উপকার করে। এই সম্পৃক্ততা শিক্ষার্থীদের সামাজিক দায়বদ্ধতার বোধ এবং সমাজ সেবায় তাদের ভূমিকা বোঝার বিকাশে সহায়তা করে।</p>
        <p>মুরাদপুর ইসলামিয়া আলিম মাদ্রাসার কাঠামোটি ইসলামী শিক্ষার কাঠামোর মধ্যে ছাত্রদের বুদ্ধিবৃত্তিক, আধ্যাত্মিক এবং সামাজিক বিকাশের জন্য একটি ব্যাপক এবং সু-বৃত্তাকার শিক্ষাগত অভিজ্ঞতা প্রদানের জন্য ডিজাইন করা হয়েছে।</p>";
    }
}
