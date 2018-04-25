<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotolocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photolocations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('id_parking');
          $table->string('floor');
          $table->text('canvas');
          $table->string('photo');
          $table->timestamps();
          $table->foreign('id_parking')->references('id')->on('parkings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photolocations');
    }
}
