<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesParkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories_park', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('user');
            $table->enum('type',[
              'leaved','reserved','entried','canceled'
            ]);
            $table->timestamps();

            $table->foreign('number')
                  ->references('number')
                  ->on('maps');
            $table->foreign('user')
                  ->references('name')
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
        Schema::dropIfExists('histories_park');
    }
}
