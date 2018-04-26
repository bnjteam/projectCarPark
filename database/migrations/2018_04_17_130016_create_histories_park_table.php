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
            $table->string('id_map');
            $table->string('id_user');
            $table->enum('type',[
              'leaved','reserved','entried','canceled'
            ]);
            $table->timestamps();

            $table->foreign('id_user')
                  ->references('id')
                  ->on('users');
            $table->foreign('id_map')
                  ->references('id')
                  ->on('maps');
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
