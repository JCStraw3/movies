<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('movies', function (Blueprint $table) {
            $table->string('id');
            $table->string('user_id');
            $table->string('title');
            $table->date('release_date');
            $table->tinyInteger('runtime')->unsigned();
            $table->text('synopsis');
            $table->string('image');
            $table->text('note');
            $table->string('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('movies');
    }
    
}