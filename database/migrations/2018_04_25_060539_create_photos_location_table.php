<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_location', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_location');
            $table->string('canvas');
            $table->timestamps();

            $table->foreign('id_location')->references('id')->on('parkings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos_location');
    }
}
