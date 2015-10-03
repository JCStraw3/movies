<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model {

	// Database table used by the model.

	protected $table = 'writers';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
	];

	// Writer can be attached to many movies.

	public function movies(){
		return $this->belongsToMany('App\Movie');
	}

}