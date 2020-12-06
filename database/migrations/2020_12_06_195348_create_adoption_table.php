<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdoptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoption', function (Blueprint $table) {
            $table->uuid('adoption_id');
            $table->primary('adoption_id');
            $table->uuid('animal_id');
            $table->foreign('animal_id')->references('animal_id')->on('animal');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('status_id')->on('adoption_status');
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
        Schema::dropIfExists('adoption');
    }
}
