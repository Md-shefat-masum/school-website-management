<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            BlogCategorySeeder::class,
            BlogSeeder::class,
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
            NavbarMenuItemSeeder::class,
            NavbarMenuDetailsSeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            SettingSeeder::class,
            TagSeeder::class,

        ]);
    }
}
