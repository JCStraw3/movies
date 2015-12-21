<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->boolean('public');
            $table->timestamps();
        });

        Schema::create('list_movie', function (Blueprint $table){
            $table->integer('movie_id')->unsigned()->index();

            $table->integer('list_id')->unsigned()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('lists');
        Schema::drop('list_movie');
    }

}