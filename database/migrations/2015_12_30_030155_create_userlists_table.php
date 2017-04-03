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
            $table->string('id');
            $table->string('user_id');
            $table->string('name');
            $table->boolean('public');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('movie_userlist', function (Blueprint $table){
            $table->string('movie_id')->index();

            $table->string('userlist_id')->index();

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