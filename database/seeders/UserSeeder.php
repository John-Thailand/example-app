<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'password' => Hash::make('test1234')    // パスワードは暗号化してDBにデータを保存しておく
            ],
            [
                'name' => 'おおたけ',
                'email' => 'test1@test.com',
                'password' => Hash::make('test1234')
            ],
            [
                'name' => 'よしお',
                'email' => 'test2@test.com',
                'password' => Hash::make('test1234')
            ]
        ]);
    }
}
