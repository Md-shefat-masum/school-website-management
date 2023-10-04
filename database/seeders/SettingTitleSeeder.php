<?php

namespace Database\Seeders;

use App\Models\Settings\SettingTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingTitle::create([
            "title" => "Title",
        ]);
    }
}
