<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_image', function (Blueprint $table) {
            $table->int('link_id');
            $table->primary('link_id'); 
            $table->uuid('animal_id');
            $table->foreign('animal_id')->references('animal_id')->on('animal');
            $table->uuid('image_id');
            $table->foreign('image_id')->references('image_id')->on('image');
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
        Schema::dropIfExists('animal_image');
    }
}
