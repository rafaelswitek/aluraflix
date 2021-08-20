<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "title" => "Livre",
            "color" => "FF5733",
        ]);
        Category::create([
            "title" => "Alura",
            "color" => "3355FF",
        ]);
        Category::create([
            "title" => "Dias de Dev",
            "color" => "C433FF",
        ]);
        Category::create([
            "title" => "Rafaella Ballerini",
            "color" => "FF7A33",
        ]);
    }
}
