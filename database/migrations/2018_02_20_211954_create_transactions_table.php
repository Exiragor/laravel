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
            $table->timestamps();
            $table->timestamp('date_time')->nullable();

            $table->integer('block_id')->unsigned();
            $table->integer('currency_id')->unsigned();

            $table->decimal('amount', 21, 8);
            $table->string('from_address');
            $table->string('to_address');
            $table->string('hash');

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
        Schema::dropIfExists('transactions');
    }
}
