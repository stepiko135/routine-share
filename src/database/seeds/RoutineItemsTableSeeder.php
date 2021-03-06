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
                'title' => 'スマートアラームで起床⏰',
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
                'desc' => '余裕のある朝はフレンチトーストやパンケーキを作ります。少し手抜きな日はシリアルを食べてます。',
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
                'desc' => '毎日、トースター🍞とプロテイン１杯🥛。これは完全に決まっています。
食べるものが決めてあると時間が節約できます！',
            ],
            [
                'user_id' => 3,
                'routine_id' => 3,
                'time' => '08:00:00',
                'title' => '１日の予定確認',
                'desc' => '今日やらないといけないこと、今日やりたいこと、の2つをメモアプリ🗒に書き出して一日のスケジューリングをします',
            ],
            [
                'user_id' => 3,
                'routine_id' => 3,
                'time' => '08:20:00',
                'title' => 'ランニング🏃‍♂️',
                'desc' => '5kmほど走ります。朝の運動は気持ちいいです。
同じルートを走りますが、四季の移ろいを感じます。',
            ],
            [
                'user_id' => 3,
                'routine_id' => 3,
                'time' => '09:00:00',
                'title' => 'シャワーを浴びて、その日のタスクに取り掛かります。',
                'desc' => 'シャワーを浴びながら次にやることを考えます。身体も目覚めて気持ちサッパリで次の作業に移れます！',
            ],
            [
                'user_id' => 4,
                'routine_id' => 4,
                'time' => '09:00:00',
                'title' => 'たっぷり寝る☀️',
                'desc' => 'なんならアラームもかけないくらいにたっぷり（笑）',
            ],
            [
                'user_id' => 4,
                'routine_id' => 4,
                'time' => '09:20:00',
                'title' => '朝ごはん🍽',
                'desc' => 'いつもの朝よりも彩りを意識して
あとは、大好きな甘いミルクティー☕️を一緒に。',
            ],
            [
                'user_id' => 4,
                'routine_id' => 4,
                'time' => '10:00:00',
                'title' => 'お気に入りのテレビ、映画でリラックス〜',
                'desc' => '落ち着いた映画を見てますね。
泣ける映画も泣いた後はココロがスッキリするからおすすめ',
            ],
            [
                'user_id' => 4,
                'routine_id' => 4,
                'time' => '12:00:00',
                'title' => 'ウーバーイーツ',
                'desc' => '作るのは大変。
たまには贅沢しよ。
いい時代だよね、ほんと',
            ],
            [
                'user_id' => 4,
                'routine_id' => 4,
                'time' => '13:00:00',
                'title' => '昼寝 or 掃除',
                'desc' => '極端な２択（笑）
まったりしたいときはお昼寝しちゃう
少し動きたいなってときは、掃除するかな。
部屋もきれいになるし、気持ちもスッキリするんだよね',
            ],
            [
                'user_id' => 4,
                'routine_id' => 4,
                'time' => '15:00:00',
                'title' => '読書📖',
                'desc' => 'いつか読もうって買ったまま積ん読の本たちに手を付ける
半身浴なんかしながらだと更にリラックス＆集中できるよね',
            ],
            // [
            //     'user_id' => ,
            //     'routine_id' => ,
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            [
                'user_id' => '5',
                'routine_id' => '5',
                'time' => '08:00:00',
                'title' => '起きる',
                'desc' => '',
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
                'time' => '11:00:00',
                'title' => '買い物',
                'desc' => 'スーパードラッグストアを回ります',
            ],
            // [
                //     'user_id' => '',
                //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            [
                'user_id' => 8,
                'routine_id' => 8,
                'time' => '08:15:00',
                'title' => 'スキンケア・化粧',
                'desc' => 'とにかく体を起こしてベッドから離れる。
着替えまでできればベッドに逆戻りする可能性が激減するので頑張りましょう！',
            ],
            [
                'user_id' => 8,
                'routine_id' => 8,
                'time' => '08:00:00',
                'title' => '起床',
                'desc' => '平日よりも念入りにやります。
この過程で結構目が覚めます。',
            ],
            [
                'user_id' => 8,
                'routine_id' => 8,
                'time' => '08:40:00',
                'title' => 'カフェで朝食をとる',
                'desc' => 'コーヒーはマストアイテムです☕️
濃く美味しいコーヒーと特別感のある朝食で気分を上げます。',
            ],
            [
                'user_id' => 8,
                'routine_id' => 8,
                'time' => '09:30:00',
                'title' => '帰宅して作業開始',
                'desc' => '気合いが入ったところで作業開始です！',
            ],
            // [
            //     'user_id' => '',
            //     'routine_id' => '',
            //     'time' => '',
            //     'title' => '',
            //     'desc' => '',
            // ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '05:30:00',
                'title' => '起床',
                'desc' => '最近は目覚ましより先に目が覚めてしまいます。',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '05:35:00',
                'title' => '歯磨きと洗顔',
                'desc' => '寝起きは口の中が気持ち悪い！おじさんだから！',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '05:40:00',
                'title' => '体重計に乗る',
                'desc' => '目標体重まであと12kg！',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '05:42:00',
                'title' => '瞑想',
                'desc' => 'そのまま寝ちゃいそうな時もしばしば。',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '05:45:00',
                'title' => '前日の日誌・目的・目標の確認',
                'desc' => '日々現在地と目的地の距離を確認',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '06:00:00',
                'title' => 'リマインダー ・カレンダー・メールの確認',
                'desc' => '',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '06:10:00',
                'title' => 'スマホのゲーム',
                'desc' => '頭の回転が早くなりそうな気がするゲームを少々',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '06:20:00',
                'title' => '速読の練習',
                'desc' => 'あんまり早くなっている気がしない・・・',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '06:35:00',
                'title' => '速聴',
                'desc' => '4倍速〜8倍速で聞いてます。
8倍速はほとんど聞き取れません。',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '06:45:00',
                'title' => 'lumosity',
                'desc' => '頭良くなりそうなゲームができるサイト。
スマホのappもあります。',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '07:00:00',
                'title' => 'タイピング練習',
                'desc' => 'タイピング早くなればコード書くの早くなるかなぁ・・・って思って。',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '07:30:00',
                'title' => 'ストレッチ',
                'desc' => 'ストレッチすると頭の少しすっきりする気がします^^',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '07:50:00',
                'title' => '筋トレ',
                'desc' => '体動かした方が集中力も上がるような、上がらないような・・・
低負荷で回数増やすとやるのが面倒になるので、高負荷で回数を減らすのがオススメです^^',
            ],
            [
                'user_id' => 15,
                'routine_id' => 15,
                'time' => '15:00:00',
                'title' => 'ランニング',
                'desc' => 'いやー、ランニングはサボりがちなんですよねー',
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

        ]);
    }
}
