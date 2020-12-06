<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordRecoveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_recovery', function (Blueprint $table) {
            $table->string('token');
            $table->primary('token');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('email');
            $table->boolean('valid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_recovery');
    }
}
