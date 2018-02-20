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

            $table->integer('payment_id')->nullable()->unsigned();
            $table->integer('currency_id')->nullable()->unsigned();
            $table->integer('game_id')->nullable()->unsigned();

            $table->string('type');
            $table->string('symbol');
            $table->boolean('winner')->default(false);
            $table->decimal('rate_amount', 21,8);
            $table->integer('rate_index');
            $table->decimal('rate_profit', 21,8);

            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('game_id')->references('id')->on('games');
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
