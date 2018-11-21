<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_saving');
            $table->integer('balance');

            $table->integer('id_user')->unsigned();

            $table->timestamps();

            $table->foreign('id_user', 'fk_id_user')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('savings', function (Blueprint $table) {
            $table->dropForeign('fk_id_user');
        });

        Schema::dropIfExists('savings');
    }
}
