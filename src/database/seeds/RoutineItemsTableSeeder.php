<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutineItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routine_items')->insert([
            [
                'user_id' => 2,
                'routine_id' => 1,
                'time' => '07:00:00',
                'title' => 'スマートアラームで起床',
                'desc' => '普通のアラームでは起きれない人におすすめです！',
            ],
            [
                'user_id' => 2,
                'routine_id' => 1,
                'time' => '07:10:00',
                'title' => 'コップ一杯の水を飲む',
                'desc' => 'いきなり朝ごはん食べたりするとお腹に負担がかかるからまずは水を飲んで身体を目覚めさせます。',
            ],
            [
                'user_id' => 2,
                'routine_id' => 1,
                'time' => '07:30:00',
                'title' => '朝食',
                'desc' => '時短でできるけどヘルシーなものを食べてます。１，スムージー　好きなグリーン野菜とバナナ、りんごで作ります。　２，ゆで卵　事前に茹でてあるので皮むけばすぐ食べれます。　３，ヨーグルト　お腹の調子を整えます。　スムージーの作り方は私のブログにも書いてるのでチェックしてみてください！　http://www.example-my-blog.jp',
            ],
            [
                'user_id' => 2,
                'routine_id' => 1,
                'time' => '07:30:00',
                'title' => 'テレビは見ない',
                'desc' => 'ぼーっと眺めてしまうので、平日朝はテレビは見ません。代わりに好きな音楽を流して気持ちを上げます↑↑',
            ],
            [
                'user_id' => 2,
                'routine_id' => 1,
                'time' => '07:45:00',
                'title' => '出勤',
                'desc' => '電車通勤なので、車内で業界ニュースなどをチェックします。集中するためにもイヤフォン必須ですね！オススメはこれ→ http://awesome-earphone.com/',
            ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],

        ]);
    }
}
