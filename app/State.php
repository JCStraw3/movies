<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model {

	// Database table used by the model.

	protected $table = 'states';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
	];

	// States can be attached to many movies.

	public function movies(){
		return $this->belongsToMany('App\Movie')
			->withTimestamps();
	}

}