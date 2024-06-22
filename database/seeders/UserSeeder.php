<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'なおき',
                'email' => 'test@test.com',
                'password' => 'test1234'
            ],
            [
                'name' => 'おおたけ',
                'email' => 'test1@test.com',
                'password' => 'test1234'
            ],
            [
                'name' => 'よしお',
                'email' => 'test2@test.com',
                'password' => 'test1234'
            ]
        ]);
    }
}
