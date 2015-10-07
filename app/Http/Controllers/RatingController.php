<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rating;

class RatingController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View all ratings.

	public function viewReadAll(){

		$ratings = Rating::all();

		return view('ratings.viewReadAll')
			->with('ratings', $ratings);

	}

	// View all movies attached to rating.

	public function viewReadOne($id){

		$rating = Rating::findOrFail($id);

		return view('ratings.viewReadOne')
			->with('rating', $rating);

	}

}