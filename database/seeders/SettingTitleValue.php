<?php

namespace Database\Seeders;

use App\Models\Settings\SettingTitleValue as SettingsSettingTitleValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTitleValue extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingsSettingTitleValue::create([
            "setting_title_id" => 1,
            "title" => "title",
            "value" => "value "
        ]);
    }
}
