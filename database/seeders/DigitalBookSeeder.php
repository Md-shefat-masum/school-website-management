<?php

namespace Database\Seeders;

use App\Models\DigitalBook\DigitalBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DigitalBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DigitalBook::create([
            "digital_book_categories_id" => 1,
            "title" => "title",
            "link" => "#",
        ]);
    }
}
