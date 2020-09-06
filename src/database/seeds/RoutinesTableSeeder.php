<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routines')->insert([
            [
                'id' => 1,
                'user_id' => 2,
                'name' => '平日モーニングルーティン',
                'desc' => '早起きが苦手な私の平日ルーティンです。',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'name' => '休日のルーティン',
                'desc' => 'ゆったり過ごしたい休日におすすめのルーティンです！',
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'name' => 'モーニングルーティン',
                'desc' => '同じ行動を繰り返すことでメンタルが安定します
僕は休日も平日も変わらずこのリズムですね',
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'name' => 'とにかくリラックスしまくる日のルーティン',
                'desc' => '休みの過ごし方、さらします（笑）',
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'name' => '休みの日の過ごし方',
                'desc' => 'お酒好き25歳の休みの過ごし方',
            ],
            // [
            //     'id' => 6,
            //     'user_id' => 3,
            //     'name' => '',
            //     'desc' => '',
            // ],
            // [
            //     'id' => 7,
            //     'user_id' => 4,
            //     'name' => '',
            //     'desc' => '',
            // ],
            [
                'id' => 8,
                'user_id' => 8,
                'name' => '活動的に過ごしたい時の休日ルーティン',
                'desc' => '休日は意識しないとダラけがちなので、活動的になるために実施しているルーティンを紹介します！',
            ],
            // [
            //     'id' => 9,
            //     'user_id' => 6,
            //     'name' => '',
            //     'desc' => '',
            // ],
            // [
            //     'id' => 10,
            //     'user_id' => 7,
            //     'name' => '',
            //     'desc' => '',
            // ],
            [
                'id' => 15,
                'user_id' => 15,
                'name' => '休日のルーティン',
                'desc' => '休みの日はあれこれつめこんでいます。',
            ],
        ]);
    }
}
