<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Movie;

use Auth;

class MovieController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views.

	// View page to create a new movie.

	public function viewCreate(){

		$user = Auth::user();

		return view('movies.viewCreate')->with('user', $user);

	}

	// View all movies attached to the logged in user.

	public function viewReadAll(){

		$user = Auth::user();

		$movies = Movie::where('user_id', '=', $user->id)->latest()->get();

		return view('movies.viewReadAll')->with('movies', $movies);

	}

	// View single movie's profile.

	public function viewReadOne($id){

		$user = Auth::user();

		$movie = Movie::where('user_id', '=', $user->id)->findOrFail($id);

		return view('movies.viewReadOne')->with('movie', $movie);

	}

// Actions.

	// Create a movie in the database.

	public function actionCreate(Requests\CreateMovieRequest $request){

		$movie = new Movie($request->all());

		Auth::user()->movies()->save($movie);

		return redirect('movies');

	}

	// Update a movie's information in the database.

	public function actionUpdate($id, Requests\UpdateMovieRequest $request){

		$user = Auth::user();

		$movie = Movie::where('user_id', '=', $user->id)->findOrFail($id);

		$movie->update($request->all());

		return view('movies.viewReadOne')->with('movie', $movie)->with('user', $user);

	}

	// Delete a movie from the database.

	public function actionDelete($id){

		$user = Auth::user();

		$movie = Movie::where('user_id', '=', $user->id)->findOrFail($id);

		$movie->delete($movie);

		return redirect('movies');

	}
	
}