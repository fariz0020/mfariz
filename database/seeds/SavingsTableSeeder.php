<?php

use Illuminate\Database\Seeder;

class SavingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Saving::class, 2)->create();
    }
}
