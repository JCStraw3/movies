<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Genre;
use App\Movie;

use Auth;

class GenreController extends Controller{

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	public function viewReadAll(){

		$genres = Genre::orderBy('name', 'asc')->get();

		return view('genres.viewReadAll')
			->with('genres', $genres);

	}

	public function viewReadOne($id){

		$genre = Genre::findOrFail($id);

		return view('genres.viewReadOne')
			->with('genre', $genre);

	}
}
