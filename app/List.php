<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model {

	// Database used by the model.

	protected $table = 'lists';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
		'public',
	]

	// List belongs to one user.

	public function user(){
		return $this->belongsTo('App\User');
	}

	// Lists can have many movies.

	public function movies(){
		return $this->belongsToMany('App\Movie')
			->withTimestamps();
	}

}