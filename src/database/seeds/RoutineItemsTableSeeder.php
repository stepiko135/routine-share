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
                'desc' => '時短でできるけどヘルシーなものを食べてます。
１，スムージー　好きなグリーン野菜とバナナ、りんごで作ります。　
２，ゆで卵　事前に茹でてあるので皮むけばすぐ食べれます。　
３，ヨーグルト　お腹の調子を整えます。',
            ],
            [
                'user_id' => 2,
                'routine_id' => 1,
                'time' => '07:30:00',
                'title' => 'テレビは見ない',
                'desc' => 'ぼーっと眺めてしまうので、平日朝はテレビは見ません。
代わりに好きな音楽を流して気持ちを上げます↑↑',
            ],
            [
                'user_id' => 2,
                'routine_id' => 1,
                'time' => '07:45:00',
                'title' => '出勤',
                'desc' => '電車通勤なので、車内で業界ニュースなどをチェックします。
集中するためにもイヤフォン必須ですね！',
            ],
            [
                'user_id' => 2,
                'routine_id' => 1,
                'time' => '08:30:00',
                'title' => '出社',
                'desc' => '会社でのあいさつは欠かしません。ワントーン高いくらいの声でするのがポイントです！',
            ],
            [
                'user_id' => 2,
                'routine_id' => 2,
                'time' => '08:00:00',
                'title' => '起床',
                'desc' => '平日よりはゆっくり目に起きます。',
            ],
            [
                'user_id' => 2,
                'routine_id' => 2,
                'time' => '08:05:00',
                'title' => '目覚めの１杯！',
                'desc' => 'コップ１杯の水で身体も目も覚めます',
            ],
            [
                'user_id' => 2,
                'routine_id' => 2,
                'time' => '08:30:00',
                'title' => '朝食',
                'desc' => '余裕のある朝はフレンチトーストやパンケーキを作ります。余裕のない日はシリアルを食べてます。',
            ],
            [
                'user_id' => 2,
                'routine_id' => 2,
                'time' => '08:40:00',
                'title' => '新聞チェック',
                'desc' => '朝ごはんを食べながら新聞をざっと読みます。',
            ],
            [
                'user_id' => 3,
                'routine_id' => 3,
                'time' => '07:00:00',
                'title' => '起きる',
                'desc' => 'まずはカーテンを開けて陽の光を浴びます。晴れた朝に伸びをするのが最高に気持ちいいです😁',
            ],
            [
                'user_id' => 3,
                'routine_id' => 3,
                'time' => '07:10:00',
                'title' => 'スマホチェック',
                'desc' => '着替えたらそのままベッドでスマホのニュースをチェックします。
ニュースを読んでる間に目が覚めてきます',
            ],
            [
                'user_id' => 3,
                'routine_id' => 3,
                'time' => '07:20:00',
                'title' => 'ひげ剃り、洗顔',
                'desc' => 'ひげ剃りをしてから、洗顔をします。
肌が荒れがちなのでスキンケアは入念にします',
            ],
            [
                'user_id' => 3,
                'routine_id' => 3,
                'time' => '07:40:00',
                'title' => '朝ごはん',
                'desc' => '毎日、トースターとプロテイン１杯。これは完全に決まっています。
食べるものが決めてあると時間が節約できます！',
            ],
            [
                'user_id' => 3,
                'routine_id' => 3,
                'time' => '08:00:00',
                'title' => '１日の予定確認',
                'desc' => '今日やらないといけないこと、今日やりたいこと、の2つをメモアプリに書き出して一日のスケジューリングをします。',
            ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            [
                'user_id' => '5',
                'routine_id' => '5',
                'time' => '11:00:00',
                'title' => '買い物',
                'desc' => 'スーパードラッグストアを回ります',
            ],
            [
                'user_id' => '5',
                'routine_id' => '5',
                'time' => '09:00:00',
                'title' => '家事スタート',
                'desc' => '洗濯は朝に回す派です',
            ],
            [
                'user_id' => '5',
                'routine_id' => '5',
                'time' => '08:00:00',
                'title' => '起きる',
                'desc' => '',
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

        ]);
    }
}
