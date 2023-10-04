<?php

namespace Database\Seeders;

use App\Models\DigitalBook\DigitalBookCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DigitalBookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DigitalBookCategory::create([
            "title" => "book",
        ]);
    }
}
