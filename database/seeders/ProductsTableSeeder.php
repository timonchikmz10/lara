<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'weight' => '500',
                'count' => 10,
                'image' => 'products/product01.png',
                'code' => 'cover_1',
                'title' => 'Чехол №1',
                'short_description' => 'Коротокий опис',
                'description' => 'Опис товару',
                'price' => 100,
                'sale_price' => 90,
                'new' => 1
            ],
            [
                'category_id' => 1,
                'weight' => '500',
                'count' => rand(0, 10),
                'image' => 'products/product02.png',
                'code' => 'cover_2',
                'title' => 'Чехол №2',
                'short_description' => 'Коротокий опис',
                'description' => 'Опис товару',
                'price' => 200,
                'sale_price' => 0,
                'new' => 0
            ],
            [
                'category_id' => 1,
                'weight' => '500',
                'count' => rand(0, 10),
                'image' => 'products/product03.png',
                'code' => 'cover_3',
                'title' => 'Чехол №3',
                'short_description' => 'Коротокий опис',
                'description' => 'Опис товару',
                'price' => 300,
                'sale_price' => 0,
                'new' => 0
            ],
            [
                'category_id' => 2,
                'weight' => '500',
                'count' => rand(0, 10),
                'image' => 'products/product04.png',
                'code' => 'braid_1',
                'title' => 'Обплетення №1',
                'short_description' => 'Коротокий опис',
                'description' => 'Опис товару',
                'price' => 100,
                'sale_price' => 90,
                'new' => 1
            ],
            [
                'category_id' => 2,
                'weight' => '500',
                'count' => rand(0, 10),
                'image' => 'products/product05.png',
                'code' => 'braid_2',
                'title' => 'Обплетення №2',
                'short_description' => 'Коротокий опис',
                'description' => 'Опис товару',
                'price' => 200,
                'sale_price' => 0,
                'new' => 0
            ],
            [
                'category_id' => 2,
                'weight' => '500',
                'count' => rand(0, 10),
                'image' => 'products/product06.png',
                'code' => 'braid_3',
                'title' => 'Обплетення №3',
                'short_description' => 'Коротокий опис',
                'description' => 'Опис товару',
                'price' => 300,
                'sale_price' => 0,
                'new' => 0
            ],
            [
                'category_id' => 3,
                'weight' => '500',
                'count' => rand(0, 10),
                'image' => 'products/product07.png',
                'code' => 'test_1',
                'title' => 'Тестовий товар №1',
                'short_description' => 'Коротокий опис',
                'description' => 'Опис товару',
                'price' => 100,
                'sale_price' => 90,
                'new' => 1
            ],
            [

                'category_id' => 3,
                'weight' => '500',
                'count' => rand(0, 10),
                'image' => 'products/product08.png',
                'code' => 'test_2',
                'title' => 'Тестовий товар №2',
                'short_description' => 'Коротокий опис',
                'description' => 'Опис товару',
                'price' => 200,
                'sale_price' => 0,
                'new' => 0
            ],
            [
                'category_id' => 3,
                'weight' => '500',
                'count' => rand(0, 10),
                'image' => 'products/product09.png',
                'code' => 'test_3',
                'title' => 'Тестовий товар №3',
                'short_description' => 'Коротокий опис',
                'description' => 'Опис товару',
                'price' => 300,
                'sale_price' => 0,
                'new' => 0
            ],
        ]);

    }
}
