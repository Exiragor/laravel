<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->boolean('active')->default(true);

            $table->decimal('rate_amount', 21,8)->unsigned();
            $table->decimal('rate_index', 5, 2)->unsigned();
            $table->decimal('rate_profit', 21,8)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
