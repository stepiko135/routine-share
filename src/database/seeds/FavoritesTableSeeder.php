<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->insert([
            [
                'user_id' => 2,
                'routine_id' => 1,
            ],
            [
                'user_id' => 3,
                'routine_id' => 1,
            ],
            [
                'user_id' => 4,
                'routine_id' => 1,
            ],
            [
                'user_id' => 5,
                'routine_id' => 1,
            ],
            [
                'user_id' => 6,
                'routine_id' => 1,
            ],
            [
                'user_id' => 9,
                'routine_id' => 1,
            ],
            // routine_id = 2の評価
            [
                'user_id' => 2,
                'routine_id' => 2,
            ],
            [
                'user_id' => 3,
                'routine_id' => 2,
            ],
            [
                'user_id' => 5,
                'routine_id' => 2,
            ],
            [
                'user_id' => 7,
                'routine_id' => 2,
            ],
            [
                'user_id' => 9,
                'routine_id' => 2,
            ],
            [
                'user_id' => 10,
                'routine_id' => 2,
            ],
            // routine_id = 3　の評価
            [
                'user_id' => 2,
                'routine_id' => 3,
            ],
            [
                'user_id' => 4,
                'routine_id' => 3,
            ],
            [
                'user_id' => 6,
                'routine_id' => 3,
            ],
            [
                'user_id' => 7,
                'routine_id' => 3,
            ],
            [
                'user_id' => 8,
                'routine_id' => 3,
            ],
            [
                'user_id' => 10,
                'routine_id' => 3,
            ],
            // [
            //     'user_id' => ,
            //     'routine_id' => ,
            // ],
            // [
            //     'user_id' => ,
            //     'routine_id' => ,
            // ],
            
        ]);
    }
}
