<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('userlists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->boolean('public');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('movie_userlist', function (Blueprint $table){
            $table->integer('movie_id')->unsigned()->index();

            $table->integer('userlist_id')->unsigned()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('userlists');
        Schema::drop('movie_userlist');
    }

}