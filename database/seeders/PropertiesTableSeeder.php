<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
            ['title' => 'Червоний', 'rgb_code' => '#444444'],
            ['title' => 'Зелений', 'rgb_code' => '#444444'],
            ['title' => 'Жовтий', 'rgb_code' => '#444444'],
        ]);
    }
}
