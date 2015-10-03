<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model {

	// Database table used by the model.

	protected $table = 'casts';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
	];

	// Cast can be attached to many movies.

	public function movies(){
		return $this->belongsToMany('App\Movie');
	}

}