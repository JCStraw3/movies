<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rating;

use Auth;

class RatingController extends Controller {

// Middleware

	// Only logged in users can see the app.
	// If not logged in, redirected to login page.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View create page.

	public function viewCreate(){

		$user = Auth::user();

		return view('ratings.viewCreate')
			->with('user', $user);

	}

	// View all ratings.

	public function viewReadAll(){

		$user = Auth::user();

		$ratings = Rating::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		return view('ratings.viewReadAll')
			->with('ratings', $ratings);

	}

	// View all movies attached to rating.

	public function viewReadOne($id){

		$user = Auth::user();

		$rating = Rating::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('ratings.viewReadOne')
			->with('rating', $rating);

	}

	// View page to update a rating.

	public function viewUpdate($id){

		$user = Auth::user();

		$rating = Rating::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('ratings.viewUpdate')
			->with('rating', $rating);

	}

// Actions

	// Create a new rating in the database.

	public function actionCreate(Requests\CreateRatingRequest $request){

		$rating = new Rating([
			'name' => $request->name,
		]);

		Auth::user()->ratings()->save($rating);

		\Session::flash('flash_message', 'You have successfully created a rating.');

		return redirect('/ratings/'.$rating->id);

	}

	// Update a rating in the database.

	public function actionUpdate($id, Requests\UpdateRatingRequest $request){

		$user = Auth::user();

		$rating = Rating::where('user_id', '=', $user->id)
			->findOrFail($id);

		$rating->update([
			'name' => $request->name,
		]);

		\Session::flash('flash_message', 'You have successfully updated a rating.');

		return redirect('/ratings/'.$rating->id);

	}

	// Delete a rating from the database.

	public function actionDelete($id){

		$user = Auth::user();

		$rating = Rating::where('user_id', '=', $user->id)
			->findOrFail($id);

		$rating->delete($rating);

		\Session::flash('flash_message', 'You have successfully deleted a rating.');

		return redirect('ratings');

	}

}