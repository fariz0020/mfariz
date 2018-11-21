<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\Transaction::truncate();

        $balance = 0;

        for($i = 0;$i<10;$i++) {
            $a = rand(100000, 999999);
            \App\Transaction::insert([
                "value" => $a,
                "description" => "saving ".$a,
                "id_saving" => \App\Saving::first()->id,
                "id_type" => \App\TransactionType::where('name', 'Saving')->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $balance = $balance + $a;
        }

        for($i = 0;$i<6;$i++) {
            $a = rand(10000, 99999);
            \App\Transaction::insert([
                "value" => $a,
                "description" => "withdraw ".$a,
                "id_saving" => \App\Saving::first()->id,
                "id_type" => \App\TransactionType::where('name', 'Withdraw')->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $balance = $balance - $a;
        }

        for($i = 0;$i<4;$i++) {
            $a = rand(10000, 99999);
            \App\Transaction::insert([
                "value" => $a,
                "description" => "transfer ".$a,
                "id_saving" => \App\Saving::first()->id,
                "id_type" => \App\TransactionType::where('name', 'Transfer')->first()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            $balance = $balance - $a;
        }

        \App\Saving::first()->update([
            "balance" => $balance
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
