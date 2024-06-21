<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'user_id' => 1,
                'title' => 'ゴミ捨て',
                'date' => Carbon::now(),
                'description' => '燃えるゴミの日。朝８時までにゴミを捨てる。'
            ],
            [
                'user_id' => 2,
                'title' => 'ポケモンカード購入',
                'date' => Carbon::now()->addDay(1),
                'description' => 'ポケモンセンターでポケモンカードを購入しよう。'
            ],
            [
                'user_id' => 3,
                'title' => 'ギャンブル',
                'date' => Carbon::now()->addDay(2),
                'description' => '福岡の競艇場に行こう。'
            ]
        ]);
    }
}
