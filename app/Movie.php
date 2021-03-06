<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

	// Database table used by the model.

	protected $table = 'movies';

	// Attributes that are mass assignable.

	protected $fillable = [
		'id',
		'title',
		'release_date',
		'runtime',
		'synopsis',
        'image',
        'note',
        'score',
	];

	// Movie belongs to one user.

	public function user(){
		return $this->belongsTo('App\User');
	}

	// Movie has many genres.

	public function genres(){
		return $this->belongsToMany('App\Genre');
	}

	// Movie has many ratings.

	public function ratings(){
		return $this->belongsToMany('App\Rating');
	}

	// Movie can have many directors.

	public function directors(){
		return $this->belongsToMany('App\Director');
	}

	// Movie can have many writers.

	public function writers(){
		return $this->belongsToMany('App\Writer');
	}

	// Movie can have many casts.

	public function casts(){
		return $this->belongsToMany('App\Cast');
	}

	// Movie can have many labels.

	public function labels(){
		return $this->belongsToMany('App\Label');
	}

	// Moive can belong to many userlists.

	public function userlists(){
		return $this->belongsToMany('App\Userlist');
	}

}