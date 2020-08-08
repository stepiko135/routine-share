<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RoutinesTableSeeder::class);
        $this->call(RoutineItemsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
    }
}
