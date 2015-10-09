<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Director;

use Auth;

class DirectorController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View the create page.

	public function viewCreate(){

		$user = Auth::user();

		return view('directors.viewCreate')
			->with('user', $user);

	}

	// View all directors.

	public function viewReadAll(){

		$user = Auth::user();

		$directors = Director::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		return view('directors.viewReadAll')
			->with('directors', $directors);

	}

	// View all movies attached to director.

	public function viewReadOne($id){

		$user = Auth::user();

		$director = Director::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('directors.viewReadOne')
			->with('director', $director);

	}

	// View page to update a director.

	public function viewUpdate($id){

		$user = Auth::user();

		$director = Director::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('directors.viewUpdate')
			->with('director', $director);

	}

// Actions

	// Create a director in the database.

	public function actionCreate(Requests\CreateDirectorRequest $request){

		$director = new Director($request->all());

		Auth::user()->directors()->save($director);

		\Session::flash('flash_message', 'You have successfully created a director.');

		return redirect('directors');

	}

	// Update a director in the database.

	public function actionUpdate($id, Requests\UpdateDirectorRequest $request){

		$user = Auth::user();

		$director = Director::where('user_id', '=', $user->id)
			->findOrFail($id);

		$director->update($request->all());

		\Session::flash('flash_message', 'You have successfully updated a director.');

		return redirect('directors');

	}

	// Delete a director from the database.

	public function actionDelete($id){

		$user = Auth::user();

		$director = Director::where('user_id', '=', $user->id)
			->findOrFail($id);

		$director->delete($director);

		\Session::flash('flash_message', 'You have successfully deleted a director.');

		return redirect('directors');

	}

}