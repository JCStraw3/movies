<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model {

	// Database table used by the model.

	protected $table = 'labels';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
	];

	// Labels belong to one user.

	public function user(){
		return $this->belongsTo('App\User');
	}

	// Labels can be attached to many movies.

	public function movies(){
		return $this->belongsToMany('App\Movie')
			->withTimestamps();
	}

}