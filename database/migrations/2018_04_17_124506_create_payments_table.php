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
            $table->string('id_user');
            $table->string('id_package');
            $table->enum('status',[
              'completed','not completed'
            ]);
            $table->timestamps();

            $table->foreign('id_user')
                  ->references('name')
                  ->on('users');

                  $table->foreign('id_package')
                        ->references('id')
                        ->on('packages');
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
