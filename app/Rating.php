<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

	// Database table used by the model.

	protected $table = 'ratings';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
	];

	// Rating can be attached to many movies.

	public function movies(){
		return $this->belongsToMany('App\Movie')
			->withTimestamps();
	}

}