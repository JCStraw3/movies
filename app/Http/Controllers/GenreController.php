<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Genre;

use Auth;

class GenreController extends Controller{

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View the create page.

	public function viewCreate(){

		$user = Auth::user();

		return view('genres.viewCreate')
			->with('user', $user);

	}

	// View all genres.

	public function viewReadAll(){

		$user = Auth::user();

		$genres = Genre::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		return view('genres.viewReadAll')
			->with('genres', $genres);

	}

	// View all movies attached to a genre.

	public function viewReadOne($id){

		$user = Auth::user();

		$genre = Genre::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('genres.viewReadOne')
			->with('genre', $genre);

	}

	// View page to update a genre.

	public function viewUpdate($id){

		$user = Auth::user();

		$genre = Genre::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('genres.viewUpdate')
			->with('genre', $genre);

	}

// Actions

	// Create a genre in the database.

	public function actionCreate(Requests\CreateGenreRequest $request){

		$genre = new Genre($request->all());

		Auth::user()->genres()->save($genre);

		\Session::flash('flash_message', 'You have successfully created a genre.');

		return redirect('genres');

	}

	// Update a genre in the database.

	public function actionUpdate($id, Requests\UpdateGenreRequest $request){

		$user = Auth::user();

		$genre = Genre::where('user_id', '=', $user->id)
			->findOrFail($id);

		$genre->update($request->all());

		\Session::flash('flash_message', 'You have successfully updated a genre.');

		return redirect('genres');

	}

	// Delete a genre from the database.

	public function actionDelete($id){

		$user = Auth::user();

		$genre = Genre::where('user_id', '=', $user->id)
			->findOrFail($id);

		$genre->delete($genre);

		\Session::flash('flash_message', 'You have successfully deleted a genre.');

		return redirect('genres');

	}
	
}