<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlist extends Model {

	// Database used by the model.

	protected $table = 'userlists';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
		'public',
	];

	// UserList belongs to one user.

	public function user(){
		return $this->belongsTo('App\User');
	}

	// UserLists can have many movies.

	public function movies(){
		return $this->belongsToMany('App\Movie')
			->withTimestamps();
	}

}