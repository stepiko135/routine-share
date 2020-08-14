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
                'role' => 1,
            ],
            [
                'id' => 2,
                'name' => 'ヒロ',
                'email' => 'test2@test.com',
                'password' => Hash::make('password'),
                'role' => 5,
            ],
            [
                'id' => 3,
                'name' => 'イチロー',
                'email' => 'test3@test.com',
                'password' => Hash::make('password'),
                'role' => 5,
            ],
            [
                'id' => 4,
                'name' => '佐藤健',
                'email' => 'test4@test.com',
                'password' => Hash::make('password'),
                'role' => 5,
            ],
            [
                'id' => 5,
                'name' => 'あい',
                'email' => 'test5@test.com',
                'password' => Hash::make('password'),
                'role' => 5,
            ],
            [
                'id' => 6,
                'name' => 'まんまる',
                'email' => 'test6@test.com',
                'password' => Hash::make('password'),
                'role' => 5,
            ],[
                'id' => 7,
                'name' => 'Yoshy',
                'email' => 'test7@test.com',
                'password' => Hash::make('password'),
                'role' => 5,
            ],
            [
                'id' => 8,
                'name' => 'ルビー',
                'email' => 'test8@test.com',
                'password' => Hash::make('password'),
                'role' => 5,
            ],[
                'id' => 9,
                'name' => 'とととん',
                'email' => 'test9@test.com',
                'password' => Hash::make('password'),
                'role' => 5,
            ],
            [
                'id' => 10,
                'name' => 'まさと',
                'email' => 'test10@test.com',
                'password' => Hash::make('password'),
                'role' => 5,
            ],
            [
                'id' => 11,
                'name' => 'Tomoya',
                'email' => 'test11@test.com',
                'password' => Hash::make('password'),
                'role' => 5,
            ],
        ]);
    }
}
