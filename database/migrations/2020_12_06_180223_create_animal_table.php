<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->uuid('animal_id');
            $table->primary('animal_id');
            $table->string('name');
            $table->string('bio');
            $table->string('short_bio');
            $table->integer('gender');
            $table->string('breed');
            $table->date('birthday');
            $table->integer('species_id');
            $table->uuid('image_id');
            $table->boolean('published');
            $table->integer('views');
            $table->uuid('adopted_by');
            $table->foreign('adopted_by')->nullable()->references('user_id')->on('users');
            $table->uuid('owner');
            $table->foreign('owner')->references('user_id')->on('users');
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
        Schema::dropIfExists('animal');
    }
}
