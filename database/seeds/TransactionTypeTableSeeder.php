<?php

use Illuminate\Database\Seeder;

class TransactionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TransactionType::insert([
            'name' => 'Saving',
            'code' => '10'
        ]);
        \App\TransactionType::insert([
            'name' => 'Withdraw',
            'code' => '20'
        ]);
        \App\TransactionType::insert([
            'name' => 'Transfer',
            'code' => '30'
        ]);
    }
}
