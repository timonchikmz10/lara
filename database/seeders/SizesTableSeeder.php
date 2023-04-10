<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->insert([
            ['id' => 1, 'title' => 'X'],
            ['id' => 2, 'title' => 'XL'],
            ['id' => 3, 'title' => 'XXl'],
        ]);
    }
}
