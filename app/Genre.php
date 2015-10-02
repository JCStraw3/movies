<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

	// Database table used by the model.

	protected $table = 'genres';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
	];

	// Genres can be attached to many movies.

	public function movies(){
		return $this->belongsToMany('App\Movie')
			->withTimestamps();
	}

}