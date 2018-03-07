<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('payment_id')->unsigned()->nullable();
            $table->integer('currency_id')->unsigned();
            $table->integer('game_id')->unsigned()->nullable();
            $table->integer('type_id')->unsigned();

            $table->boolean('winner')->default(false);

            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bets');
    }
}
