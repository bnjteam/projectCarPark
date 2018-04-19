<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('user');
            $table->unsignedInteger('price');
            $table->string('location');
            $table->enum('status',[
              'completed','not completed'
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
        Schema::dropIfExists('payments');
    }
}
