<?php

namespace Database\Seeders;

use App\Models\Settings\SettingTitle;
use App\Models\Settings\SettingTitleValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function setting_save($settings)
    {
        foreach ($settings as $title) {
            $setting_title = SettingTitle::create([
                'title' => $title['title'],
            ]);

            foreach ($title['values'] as $value) {
                SettingTitleValue::create([
                    'setting_title_id' => $setting_title->id,
                    'title' => $setting_title->title,
                    'value' => $value['value'],

                ]);
            }
        }
    }
    public function run()
    {
        SettingTitle::truncate();
        SettingTitleValue::truncate();

        $basic_settings = [
            [

                "title" => "header_logo",
                "values" => [
                    [
                        "value" => "frontend/assets/images/website_logo/logo.png",
                    ],
                ]
            ],

            [

                "title" => "footer_logo",
                "values" => [
                    [
                        "value" => "frontend/assets/images/website_logo/logo.png",

                    ],
                ]
            ],
            [

                "title" => "map_link",
                "values" => [
                    [
                        "value" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d913.3593487015432!2d90.43766941951073!3d23.696069526706054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9c39e0b3a4f%3A0xa249612c2652875b!2sMuradpur%20Islamia%20Alim%20Madrasha%2C%20Dhaka%201204!5e0!3m2!1sen!2sbd!4v1696486262231!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

                    ],
                ]
            ],
            [

                "title" => "address_bangla",
                "values" => [
                    [
                        "value" => "মাদ্রাসা রোড, জুরাইন, ঢাকা-১২০৪",

                    ],
                ]
            ],
            [

                "title" => "address_english",
                "values" => [
                    [
                        "value" => "মাদ্রাসা রোড, জুরাইন, ঢাকা-১২০৪৭ নং, মাদ্রাসা রোড, কদমতলী, ঢাকা-১২০৪",

                    ],
                ]
            ],
            [

                "title" => "copy_right",
                "values" => [
                    [
                        "value" => "স্বত্ব © 2023| মুরাদপুর হাফেজিয়া ইসলামিয়া আলিম মাদ্রাসা কর্তৃক সর্বস্বত্ব সংরক্ষিত",

                    ],
                ]
            ],
            [

                "title" => "institue_name_bangla",
                "values" => [
                    [
                        "value" => "মুরাদপুর হাফেজিয়া ইসলামিয়া আলিম মাদ্রাসা",

                    ],
                ]
            ],
            [

                "title" => "institue_name_english",
                "values" => [
                    [
                        "value" => "Muradpur Hafezia Islamia Alim Madrasa",

                    ],
                ]
            ],
            [

                "title" => "institue_name_arabic",
                "values" => [
                    [
                        "value" => "مدرسة مرادبور حافظية الإسلامية عليم",

                    ],
                ]
            ],

            [

                "title" => "total_teachers",
                "values" => [
                    [
                        "value" => "50",

                    ],
                ]
            ],
            [

                "title" => "total_students",
                "values" => [
                    [
                        "value" => "1000",

                    ],
                ]
            ],
            [

                "title" => "exam_passing_rate",
                "values" => [
                    [
                        "value" => "85",

                    ],
                ]
            ],
            [

                "title" => "exam_passing_rate",
                "values" => [
                    [
                        "value" => "85",

                    ],
                ]
            ],
            [

                "title" => "intro_video",
                "values" => [
                    [
                        "value" => '<iframe width="1116" height="600" src="https://www.youtube.com/embed/71hi9H6fZuc" title="Nasheed Ya Adheeman - Ahmed Bukhatir  نشيد يا عظيما - أحمد بوخاطر - Arabic Music Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',

                    ],
                ]
            ],
            [

                "title" => "principal_message",
                "values" => [
                    [
                        "value" => 'বিসমিল্লাহির রাহমানির রাহীম । সকল প্রশংসা জ্ঞাপন করছি মহান আল্লাহ তা‘আলার দরবারে । মেধা ও প্রতিভা নিয়ে পৃথিবীতে কেউ জন্মায় না । প্রতিভা ও মেধার বিকাশ ঘটাতে হয় । জন্ম নিলেই মানুষ মানুষ হয় না, মনুষ্যত্ব দিয়ে তাকে মানুষ বানাতে হয়। পিতামাতা হলও সন্তানদের জন্য পৃথিবীর শ্রেষ্ঠতম অধ্যাপক এবং পরিবারই হল সবচেয়ে বড় বিদ্যাপীঠ । শিক্ষা প্রতিষ্ঠান হল মেধা ও প্রতিভা বিকাশের অন্যতম স্থান।',

                    ],
                ]
            ],
            [

                "title" => "principal_name",
                "values" => [
                    [
                        "value" => "ড. মুহাম্মাদ আবু ইউছুফ খান",
                    ],
                ]
            ],
        ];

        $this->setting_save($basic_settings);

        $contact_information_settings = [
            [
                "group" => "contact_information",
                "title" => "phone_numbers",
                "values" => [
                    [
                        "value" => "+8801000000000",
                    ],
                    [
                        "value" => "+8801000000000",
                    ],
                    [
                        "value" => "+8801000000000",
                    ],
                ]
            ],
            [
                "group" => "contact_information",
                "title" => "whatsapp",
                "values" => [
                    [
                        "value" => "+8801719229595",
                    ],
                ]
            ],
            [
                "group" => "contact_information",
                "title" => "telegram",
                "values" => [
                    [

                        "value" => "+8801719229595",
                    ],
                ]
            ],
            [
                "group" => "contact_information",
                "title" => "emails",
                "values" => [
                    [
                        "value" => "miamjuraindhaka@gmail.com",

                    ],
                    [
                        "value" => "muradpurislamiaalimmadrasa@gmail.com",

                    ],
                ]
            ],
        ];

        $this->setting_save($contact_information_settings);

        $social_media_settings = [
            [
                "group" => "social_media",
                "title" => "facebook",
                "values" => [
                    [
                        "value" => "https://www.facebook.com/miamjuraindhaka/",

                    ],
                ]
            ],
            [
                "group" => "social_media",
                "title" => "youtube",
                "values" => [
                    [
                        "value" => "https://www.youtube.com/@miamjuraindhaka",

                    ],
                ]
            ],
            [
                "group" => "social_media",
                "title" => "instagram",
                "values" => [
                    [
                        "value" => "https://www.instagram.com/@miamjuraindhaka",

                    ],
                ]
            ],
            [
                "group" => "social_media",
                "title" => "linkedin",
                "values" => [
                    [
                        "value" => "https://bd.linkedin.com/company/miamjuraindhaka",

                    ],
                ]
            ],

            [
                "group" => "social_media",
                "title" => "twitter",
                "values" => [
                    [
                        "value" => "https://twitter.com/company/miamjuraindhaka",
                    ],
                ]
            ],
        ];

        $this->setting_save($social_media_settings);

        $seo_settings = [
            [
                "group" => "seo",
                "title" => "title",
                "values" => [
                    [
                        "value" => "মুরাদপুর ইসলামিয়া আলিম মাদরাসা",

                    ],
                ]
            ],
            [
                "group" => "seo",
                "title" => "description",
                "values" => [
                    [
                        "value" => "শিক্ষা প্রতিষ্ঠান মেধা ও প্রতিভা বিকাশের অন্যতম স্থান",

                    ],
                ]
            ],
            [
                "group" => "seo",
                "title" => "keywords",
                "values" => [
                    [
                        "value" => "মুরাদপুর ইসলামিয়া আলিম মাদরাসা,Muradpur Islamia Alim Madrasa, Jurain, Dhaka,মুরাদপুর-ইসলামিয়া-আলিম-মাদরাসা,Muradpur-Islamia-Alim-Madrasa",

                    ],
                ]
            ],
        ];

        $this->setting_save($seo_settings);

        $term_pages = [
            [
                "group" => "term_pages",
                "title" => "about_us",
                "values" => [
                    [
                        "value" => $this->about_us(),

                    ],
                ]
            ],
            [
                "group" => "term_pages",
                "title" => "terms_and_condition",
                "values" => [
                    [
                        "value" => "terms_and_condition",

                    ],
                ]
            ],
            [
                "group" => "term_pages",
                "title" => "refund_policy",
                "values" => [
                    [

                        "value" => "refund_policy",

                    ],
                ]
            ],
            [
                "group" => "term_pages",
                "title" => "coockies_policy",
                "values" => [
                    [

                        "value" => "coockies_policy",

                    ],
                ]
            ],
            [
                "group" => "term_pages",
                "title" => "sitemap",
                "values" => [
                    [
                        "value" => $this->site_map(),

                    ],
                ]
            ],
        ];

        $this->setting_save($term_pages);
    }

    public function site_map()
    {
        return "
            <div class=\"sitemap_heading\">Sitemap</div>
            <div class=\"sitemap_details\">
                <div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">হোম</h2>
                        <ul>
                            <li><a href=\"#\">হেডলাইন</a></li>
                            <li><a href=\"#\">কোর্স লিস্ট</a></li>
                            <li><a href=\"#\">কোর্স ফিচার</a></li>
                            <li><a href=\"#\">আর্নিং স্টেপস</a></li>
                            <li><a href=\"#\">সাকসেস স্টোরি</a></li>
                            <li><a href=\"#\">ট্রেইনারস</a></li>
                            <li><a href=\"#\">কাউনসিলিং</a></li>
                            <li><a href=\"#\">ফ্রি সেমিনার</a></li>
                            <li><a href=\"#\">আইটি সার্ভিসগুলো</a></li>
                            <li><a href=\"#\">আমরা যাদের সাথে কাজ করেছি</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">ব্লগ</h2>
                        <ul>
                            <li><a href=\"#\">ব্লগ লিস্ট</a></li>
                            <li><a href=\"#\">ব্লগ ক্যাটাগরি</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">ব্লগ ডিটেইলস</h2>
                        <ul></ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">ফ্রি সেমিনার</h2>
                        <ul>
                            <li><a href=\"#\">সেমিনার লিস্ট</a></li>
                            <li><a href=\"#\">কোর্স লিস্ট</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">আমাদের সম্পর্কে</h2>
                        <ul>
                            <li><a href=\"#\">আমাদের সম্পর্কে</a></li>
                            <li><a href=\"#\">আমরা যাদের সাথে কাজ করেছি</a></li>
                            <li><a href=\"#\">আমাদের মটো</a></li>
                            <li><a href=\"#\">আমাদের মিশন</a></li>
                            <li><a href=\"#\">আমাদের ভিশন</a></li>
                            <li><a href=\"#\">কোর্স লিস্ট</a></li>
                            <li><a href=\"#\">সার্ভিস লিস্ট</a></li>
                            <li><a href=\"#\">আমাদের টিম</a></li>
                            <li><a href=\"#\">ট্রেইনারস</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">এফিলিয়েশন</h2>
                        <ul></ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">যোগাযোগ</h2>
                        <ul>
                            <li><a href=\"#\">যোগাযোগ নাম্বার</a></li>
                            <li><a href=\"#\">সাবমিট মেসেজ</a></li>
                            <li><a href=\"#\">অফিস লোকেশন</a></li>
                            <li><a href=\"#\">সাধারণ জিজ্ঞাসা</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">টার্মস এন্ড কন্ডিশন</h2>
                        <ul></ul>
                    </div>
                </div>
                <div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">সাকসেস স্টোরি</h2>
                        <ul>
                            <li><a href=\"#\">সাকসেস স্টোরি ভিডিও</a></li>
                            <li><a href=\"#\">সাকসেস স্টোরি টেক্সট</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">কোর্স লিস্ট</h2>
                        <ul>
                            <li><a href=\"#\">সকল কোর্স</a></li>
                            <li><a href=\"#\">গ্রাফিক্স ডিজাইন</a></li>
                            <li><a href=\"#\">ওয়েব ডেভোলাপমেন্ট</a></li>
                            <li><a href=\"#\">ডিজিটাল মার্কেটিং</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">কোর্স ডিটেইলস</h2>
                        <ul>
                            <li><a href=\"#\">কোর্স ডিটেইলস</a></li>
                            <li><a href=\"#\">কোর্স এনরোলমেন্ট</a></li>
                            <li><a href=\"#\">কোর্স মডিউল</a></li>
                            <li><a href=\"#\">কোর্স প্রশিক্ষক</a></li>
                            <li><a href=\"#\">সাধারণ জিজ্ঞাসা</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">রিফান্ড পলিসি</h2>
                        <ul></ul>
                        </div>
                        <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">প্রাইভেসি পলিসি</h2>
                        <ul></ul>
                    </div>
                </div>
                <div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">গ্যালারি</h2>
                        <ul>
                            <li><a href=\"#\">আমাদের টিম</a></li>
                            <li><a href=\"#\">ওরিয়েন্টেশন ক্লাস</a></li>
                            <li><a href=\"#\">ফেয়ারওয়েল ও সার্টিফিকেট প্রদান</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">আইটি সার্ভিস</h2>
                        <ul>
                            <li><a href=\"#\">সার্ভিস লিস্ট</a></li>
                            <li><a href=\"#\">ক্লায়েন্ট রেটিং</a></li>
                            <li><a href=\"#\">আমরা যাদের সাথে কাজ করেছি</a></li>
                            <li><a href=\"#\">ক্লায়েন্ট প্রজেক্ট </a></li>
                            <li><a href=\"#\">Hire Us</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">আইটি সার্ভিস ডিটেইলস</h2>
                        <ul>
                            <li><a href=\"#\">সার্ভিস ডিটেইলস</a></li>
                            <li><a href=\"#\">প্রাইসিং প্ল্যানিং</a></li>
                            <li><a href=\"#\">ক্লায়েন্ট প্রজেক্ট </a></li>
                            <li><a href=\"#\">Hire Us</a></li>
                        </ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">কুকিস পলিসি</h2>
                        <ul></ul>
                    </div>
                    <div class=\"sitemap_info\">
                        <h2 class=\"info_title\">সার্টিফিকেট ভেরিফাই</h2>
                        <ul></ul>
                    </div>
                </div>
                </div>
                <div class=\"student_panel\">
                    <div class=\"student_panel_heading\">
                        <h2 class=\"student_panel_title\">স্টুডেন্ট প্যানেল</h2>
                        <div class=\"student_panel_border\"></div>
                    </div>
                    <div class=\"sitemap_details\">
                        <div>
                            <div class=\"sitemap_info\">
                                <h2 class=\"info_title\">হোম</h2>
                                <ul>
                                <li><a href=\"#\">চলমান কোর্স</a></li>
                                <li><a href=\"#\">কমপ্লিট কোর্স</a></li>
                                <li><a href=\"#\">অসম্পন্ন কোর্স</a></li>
                                </ul>
                            </div>
                            <div class=\"sitemap_info\">
                                <h2 class=\"continue_info_title\">চলমান কোর্স</h2>
                                <ul>
                                <li><a href=\"#\">কোর্সের অগ্রগতি</a></li>
                                <li><a href=\"#\">ক্লাস রুটিন</a></li>
                                <li><a href=\"#\">কোর্স মডিউল</a></li>
                                </ul>
                            </div>

                        </div>
                        <div>
                            <div class=\"sitemap_info\">
                                <h2 class=\"info_title\">প্রোফাইল সেটিংস</h2>
                                <ul>

                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class=\"sitemap_info\">
                                <h2 class=\"info_title\">পাসওয়ার্ড পরিবর্তন</h2>
                                <ul>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class=\"sitemap_info\">
                                <h2 class=\"info_title\">লগ আউট</h2>
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
    public function about_us()
    {
        return "
            <div class=\"aboutus_relation_description\">
                <p class=\"aboutus_info\">
                    দেশের মানুষের বেকারত্বের সমাধান ও আইটি সেক্টরে দক্ষ জনবল তৈরি, মূলত
                    এই মৌলিক বিষয়কে ধারণ করেই টেক পার্ক আইটির যাত্রা শুরু। টেক পার্ক
                    আইটি এদেশের মানুষের মধ্যে আইসিটিতে দক্ষতার উন্নয়ন ঘটাতে চায়, যার
                    মাধ্যমে মানুষের কর্মসংস্থান তৈরির পাশাপাশি এদেশের অর্থনৈতিক উন্নয়নে
                    ভূমিকা পালন করা যাবে।
                </p>
                <p class=\"aboutus_info\">
                    শিক্ষার্থীদের চাহিদার কথা বিবেচনায় রেখে কোর্স কারিকুলাম নিয়মিত আপডেট
                    করার কারণে আমরা শিক্ষার্থীদেরকে সর্বাধুনিক প্রশিক্ষণ দিতে পারছি বলে
                    আমরা আশাবাদী। নির্দিষ্ট সময়ে কোর্স করিয়ে দিয়েই দায়িত্ব পালন সম্পন্ন
                    হয়েছে মনে না করে, আমাদের সাথে সংযুক্ত হওয়া শিক্ষার্থীদেরকে 'টেক
                    পার্ক আইটি পরিবার'-এর সদস্য হিসেবে বিবেচনা করে তাদেরকে প্রফেশনাল
                    প্রতিষ্ঠানে জবের সুযোগ করে দেওয়া এবং প্রফেশনাল উন্নয়ন দেখে আনন্দিত
                    হওয়াটা আমাদের স্বপ্নের মতো। যে স্বপ্ন পূরণে আছে আত্মীক প্রশান্তি। এ
                    প্রশান্তির পথে আমরা এগিয়ে যেতে চাই বহু দূরের পথ।
                </p>
            </div>
        ";
    }
}
