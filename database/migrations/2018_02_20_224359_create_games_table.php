<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->timestamp('opened_at')->nullable();
            $table->timestamp('finished_at')->nullable();

            $table->integer('block_id')->unsigned();
            $table->integer('currency_id')->unsigned();

            $table->string('winner_symbol')->nullable();
            $table->string('status');

            $table->foreign('block_id')->references('id')->on('blocks');
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
