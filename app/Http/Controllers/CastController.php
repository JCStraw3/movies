<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cast;

use Auth;

class CastController extends Controller {

// Middleware

	// Only logged in users can see the app.
	// If not logged in, redirected to login page.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View the create page.

	public function viewCreate(){

		$user = Auth::user();

		return view('casts.viewCreate')
			->with('user', $user);

	}

	// View all casts.

	public function viewReadAll(){

		$user = Auth::user();

		$casts = Cast::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		return view('casts.viewReadAll')
			->with('casts', $casts);

	}

	// View all movies attached to a cast.

	public function viewReadOne($id){

		$user = Auth::user();

		$cast = Cast::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('casts.viewReadOne')
			->with('cast', $cast);

	}

	// View page to update a cast.

	public function viewUpdate($id){

		$user = Auth::user();

		$cast = Cast::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('casts.viewUpdate')
			->with('cast', $cast);

	}

// Actions

	// Create a cast in the database.

	public function actionCreate(Requests\CreateCastRequest $request){

		$cast = new Cast([
			'name' => $request->name,
		]);

		Auth::user()->casts()->save($cast);

		\Session::flash('flash_message', 'You have successfully created a cast.');

		return redirect('/cast/'.$cast->id);

	}

	// Update a cast in the database.

	public function actionUpdate($id, Requests\UpdateCastRequest $request){

		$user = Auth::user();

		$cast = Cast::where('user_id', '=', $user->id)
			->findOrFail($id);

		$cast->update([
			'name' => $request->name,
		]);

		\Session::flash('flash_message', 'You have successfully updated a cast.');

		return redirect('/cast/'.$cast->id);

	}

	// Delete a cast from the database.

	public function actionDelete($id){

		$user = Auth::user();

		$cast = Cast::where('user_id', '=', $user->id)
			->findOrFail($id);

		$cast->delete($cast);

		\Session::flash('flash_message', 'You have successfully deleted a cast.');

		return redirect('cast');

	}

}