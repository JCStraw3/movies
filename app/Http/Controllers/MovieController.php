<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Movie;
use App\Genre;
use App\Rating;

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

		$genres = Genre::all();

		$ratings = Rating::all();

		return view('movies.viewCreate')
			->with('genres', $genres)
			->with('ratings', $ratings)
			->with('user', $user);

	}

	// View all movies attached to the logged in user.

	public function viewReadAll(){

		$user = Auth::user();

		$movies = Movie::where('user_id', '=', $user->id)->latest()->get();

		return view('movies.viewReadAll')
			->with('movies', $movies);

	}

	// View single movie's profile.

	public function viewReadOne($id){

		$user = Auth::user();

		$movie = Movie::where('user_id', '=', $user->id)->findOrFail($id);

		$genres = Genre::all();

		$ratings = Rating::all();

		return view('movies.viewReadOne')
			->with('movie', $movie)
			->with('genres', $genres)
			->with('ratings', $ratings);

	}

// Actions.

	// Create a movie in the database.

	public function actionCreate(Requests\CreateMovieRequest $request){

		// Saving request into movie variable.

		$movie = new Movie($request->all());

		// Saving movie variable to authenticated user.

		Auth::user()->movies()->save($movie);

		// Attaching genres to movies via pivot table.

		$genres = $request->input('genres');

		$movie->genres()->attach($genres);

		// Attaching ratings to movies via pivot table.

		$ratings = $request->input('ratings');

		$movie->ratings()->attach($ratings);

		// Sending flash message.

		\Session::flash('flash_message', 'You have successfully created a movie.');

		// Redirecting to movies page.

		return redirect('movies');

	}

	// Update a movie's information in the database.

	public function actionUpdate($id, Requests\UpdateMovieRequest $request){

		$user = Auth::user();

		$movie = Movie::where('user_id', '=', $user->id)->findOrFail($id);

		$movie->update($request->all());

		\Session::flash('flash_message', 'You have successfully updated this movie.');

		return view('movies.viewReadOne')
			->with('movie', $movie)
			->with('user', $user);

	}

	// Delete a movie from the database.

	public function actionDelete($id){

		$user = Auth::user();

		$movie = Movie::where('user_id', '=', $user->id)->findOrFail($id);

		$movie->delete($movie);

		\Session::flash('flash_message', 'You have successfully deleted a movie.');

		return redirect('movies');

	}
	
}