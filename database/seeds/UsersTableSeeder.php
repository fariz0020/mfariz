<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\User::truncate();

        factory(\App\User::class, 1)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }
}
