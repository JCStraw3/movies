<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCastsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('casts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('cast_movie', function (Blueprint $table){
            $table->integer('movie_id')->unsigned()->index();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');

            $table->integer('cast_id')->unsigned()->index();
            $table->foreign('cast_id')->references('id')->on('casts')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('casts');
        Schema::drop('cast_movie');
    }
}
