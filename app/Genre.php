<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

	// Database table used by the model.

	protected $table = 'genres';

	// Attributes that are mass assignable.

	protected $fillable = [
		'name',
	];

	// Relationships to other models.

	public function movies(){
		return $this->belongsToMany('App\Movie')->withTimestamps();
	}

}