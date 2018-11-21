<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value');
            $table->string('description', 255);

            $table->integer('id_saving')->unsigned();

            $table->timestamps();

            $table->foreign('id_saving', 'fk_id_saving')
                ->references('id')
                ->on('saving');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('fk_id_saving');
        });

        Schema::dropIfExists('transactions');
    }
}
