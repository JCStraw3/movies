<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

	// Database table used by the model.

	protected $table = 'movies';

	// Attributes that are mass assignable.

	protected $fillable = [
		'title',
		'genre',
		'release_date',
		'rating',
		'runtime',
		'director',
		'writer',
		'cast',
		'synopsis',
	];

	public function user(){
		return $this->belongsTo('App\User');
	}

}