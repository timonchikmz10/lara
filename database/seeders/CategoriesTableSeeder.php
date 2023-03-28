<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'image' => 'categories/shop01.png', 'title' => 'Чохли', 'description' => 'Опис для категорії Чохли', 'code' => 'covers'],
            ['id' => 2, 'image' => 'categories/shop02.png', 'title' => 'Обплетення', 'description' => 'Опис для категорії Обплетення', 'code' => 'braids'],
            ['id' => 3, 'image' => 'categories/shop03.png', 'title' => 'Тестова категорія', 'description' => 'Опис для категорії Тестової категорії', 'code' => 'test_category'],
        ]);
    }
}
