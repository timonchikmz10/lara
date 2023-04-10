<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->insert([
            ['id' => 1, 'title' => 'Червоний', 'rgb_code' => '#FF0000'],
            ['id' => 2, 'title' => 'Зелений', 'rgb_code' => '#7CFC00'],
            ['id' => 3, 'title' => 'Жовтий', 'rgb_code' => '#FFFF00'],
        ]);
    }
}
