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
                'name' => 'ヒロ',
                'email' => 'test1@test.com',
                'password' => Hash::make('password')
            ],
            [
                'id' => 2,
                'name' => 'Tomoya',
                'email' => 'test2@test.com',
                'password' => Hash::make('password')
            ],
            [
                'id' => 3,
                'name' => 'イチロー',
                'email' => 'test3@test.com',
                'password' => Hash::make('password')
            ],
            [
                'id' => 4,
                'name' => '佐藤健',
                'email' => 'test4@test.com',
                'password' => Hash::make('password')
            ],
            [
                'id' => 5,
                'name' => 'あい',
                'email' => 'test5@test.com',
                'password' => Hash::make('password')
            ],
            [
                'id' => 6,
                'name' => 'まんまる',
                'email' => 'test6@test.com',
                'password' => Hash::make('password')
            ],[
                'id' => 7,
                'name' => 'Yoshy',
                'email' => 'test7@test.com',
                'password' => Hash::make('password')
            ],
            [
                'id' => 8,
                'name' => 'ルビー',
                'email' => 'test8@test.com',
                'password' => Hash::make('password')
            ],[
                'id' => 9,
                'name' => 'とととん',
                'email' => 'test9@test.com',
                'password' => Hash::make('password')
            ],
            [
                'id' => 10,
                'name' => 'まさと',
                'email' => 'test10@test.com',
                'password' => Hash::make('password')
            ],
        ]);
    }
}
