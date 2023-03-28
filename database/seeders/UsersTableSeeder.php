<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Admin@admin.com',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('B5m8EeLe6Z2hg634yFd7NR5AfT4dyBt5'),
            'is_admin'=>1
        ]);
    }
}
