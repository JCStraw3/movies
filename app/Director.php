<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model {

	// Database table used by the model.

	protected $table = 'directors';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
	];
	
	// Director belongs to one user.

	public function user(){
		return $this->belongsTo('App\User');
	}

	// Director can be attached to many movies.

	public function movies(){
		return $this->belongsToMany('App\Movie')
			->withTimestamps();
	}

}