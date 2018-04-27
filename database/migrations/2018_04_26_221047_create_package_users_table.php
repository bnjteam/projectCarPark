<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_user');
            $table->integer('numbers');
            $table->enum('type',['none', 'daily', 'weekly', 'monthly', 'small','medium','large']);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_users');
    }
}
