<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => '管理者',
                'email' => 'admin@test.com',
                'password' => Hash::make('admin'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/default.png',
                'profile' => '',
                'role' => 1,
            ],
            [
                'id' => 2,
                'name' => 'ヒロ',
                'email' => 'test2@test.com',
                'password' => Hash::make('password'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/sky.jpeg',
                'profile' => '',
                'role' => 5,
            ],
            [
                'id' => 3,
                'name' => 'イチロー',
                'email' => 'test3@test.com',
                'password' => Hash::make('password'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/baseball.jpg',
                'profile' => '野球大好きです。',
                'role' => 5,
            ],
            [
                'id' => 4,
                'name' => '佐藤健',
                'email' => 'test4@test.com',
                'password' => Hash::make('password'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/surf.jpg',
                'profile' => 'サーフィンが趣味',
                'role' => 5,
            ],
            [
                'id' => 5,
                'name' => 'あい',
                'email' => 'test5@test.com',
                'password' => Hash::make('password'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/girl2.jpeg',
                'profile' => 'やっと社会人になりました！',
                'role' => 5,
            ],
            [
                'id' => 6,
                'name' => 'まんまる',
                'email' => 'test6@test.com',
                'password' => Hash::make('password'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/cat.jpg',
                'profile' => 'ねこが大好きです！',
                'role' => 5,
            ],[
                'id' => 7,
                'name' => 'Yoshy',
                'email' => 'test7@test.com',
                'password' => Hash::make('password'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/illust.jpeg',
                'profile' => 'イラスト書くのが大好きです！',
                'role' => 5,
            ],
            [
                'id' => 8,
                'name' => 'ルビー',
                'email' => 'test8@test.com',
                'password' => Hash::make('password'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/girl.png',
                'profile' => 'QOL高めたい！',
                'role' => 5,
            ],[
                'id' => 9,
                'name' => 'とととん',
                'email' => 'test9@test.com',
                'password' => Hash::make('password'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/sky2.jpg',
                'profile' => '',
                'role' => 5,
            ],
            [
                'id' => 10,
                'name' => 'まさと',
                'email' => 'test10@test.com',
                'password' => Hash::make('password'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/bird.jpg',
                'profile' => 'よろしく',
                'role' => 5,
            ],
            [
                'id' => 11,
                'name' => 'Tomoya',
                'email' => 'test11@test.com',
                'password' => Hash::make('password'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/default.png',
                'profile' => '',
                'role' => 5,
            ],
            [
                'id' => 12,
                'name' => 'ゲスト',
                'email' => 'guest@test.com',
                'password' => Hash::make('mA7SkEJU'),
                'image' => 'https://routine-share.s3-ap-northeast-1.amazonaws.com/profile/default.png',
                'profile' => '私はゲストユーザーです。',
                'role' => 5,
            ],
        ]);
    }
}
