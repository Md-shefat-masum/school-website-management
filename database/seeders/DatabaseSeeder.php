<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            RoleSeeder::class,
            UserSeeder::class,

            AcademyCalssSeeder::class,
            AcademyCalssSubjectSeeder::class,

            AtAGlanceSeeder::class,

            BannerSeeder::class,

            DigitalBookSeeder::class,
            DigitalBookCategorySeeder::class,

            EmployeeRoleSeeder::class,
            EmployeeSeeder::class,

            GalleryPhotoSeeder::class,
            GalleryPhotoCategorySeeder::class,

            GalleryPhotoSeeder::class,
            GalleryVideoCategorySeeder::class,
            GalleryVideoSeeder::class,

            NavbarMenuSeeder::class,
            NoticeSeeder::class,

            TagSeeder::class,

            BlogCategorySeeder::class,
            BlogSeeder::class,

            NewsCategorySeeder::class,
            NewsSeeder::class,

            SettingSeeder::class,

            StudentClassSeeder::class,
            SubjectSeeder::class



        ]);
    }
}
