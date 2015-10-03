<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('directors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('director_movie', function (Blueprint $table){
            $table->integer('movie_id')->unsigned()->index();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');

            $table->integer('director_id')->unsigned()->index();
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('directors');
        Schema::drop('director_movie');
    }
}
