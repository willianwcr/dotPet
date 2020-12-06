<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->uuid('animal_id');
            $table->primary('animal_id');
            $table->string('name');
            $table->string('bio');
            $table->string('short_bio');
            $table->integer('gender');
            $table->string('breed');
            $table->date('birthday');
            $table->integer('specie_id');
            $table->uuid('image_id');
            $table->boolean('published');
            $table->integer('views');
            $table->uuid('adopted_by')->nullable();
            $table->uuid('owner');
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
        Schema::dropIfExists('animals');
    }
}
