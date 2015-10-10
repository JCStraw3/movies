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
	
	// Cast belongs to one user.

	public function user(){
		return $this->belongsTo('App\User');
	}

	// Cast can be attached to many movies.

	public function movies(){
		return $this->belongsToMany('App\Movie')
			->withTimestamps();
	}

}