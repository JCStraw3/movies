<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Userlist;
use App\Movie;

use Auth;

class UserlistController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View page to create a list.

	public function viewCreate(){

		$user = Auth::user();

		$movies = Movie::where('user_id', '=', $user->id)
			->orderBy('title', 'asc')
			->get();

		return view('userlists.viewCreate')
			->with('user', $user)
			->with('movies', $movies);

	}

	// View page to read all lists.

	public function viewReadAll(){

		$user = Auth::user();

		$userlists = Userlist::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		return view('userlists.viewReadAll')
			->with('user', $user)
			->with('userlists', $userlists);

	}

	// View page to read one list.

	public function viewReadOne($id){

		$user = Auth::user();

		$userlist = Userlist::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('userlists.viewReadOne')
			->with('user', $user)
			->with('userlist', $userlist);

	}

	// View page to update a list.

	public function viewUpdate($id){

		$user = Auth::user();

		$userlist = Userlist::where('user_id', '=', $user->id)
			->findOrFail($id);

		$movies = Movie::where('user_id', '=', $user->id)
			->orderBy('title', 'asc')
			->get();

		return view('userlists.viewUpdate')
			->with('user', $user)
			->with('userlist', $userlist)
			->with('movies', $movies);

	}

// Actions

	// Create a list in the database.

	public function actionCreate(Requests\CreateUserlistRequest $request){

		$userlist = new Userlist($request->all());

		Auth::user()->userlists()->save($userlist);

		$movies = $request->input('movies');

		if(!is_array($movies)){
			$movies = [];
		}

		$userlist->movies()->attach($movies);

		\Session::flash('flash_message', 'You have successfully created a list.');

		return redirect('/lists/'.$userlist->id);

	}

	// Update a list in the database.

	public function actionUpdate($id, Requests\UpdateUserlistRequest $request){

		$userlist = Userlist::findOrFail($id);

		$userlist->update($request->all());

		$movies = $request->input('movies');

		if(!is_array($movies)){
			$movies = [];
		}

		$userlist->movies()->sync($movies);

		\Session::flash('flash_message', 'You have successfully updated a list.');

		return redirect('/lists/'.$id);

	}

	// Delete a list from the database.

	public function actionDelete($id){

		$userlist = Userlist::findOrFail($id);

		$userlist->delete($userlist);

		\Session::flash('flash_message', 'You have successfully deleted a list.');

		return redirect('/lists');

	}

}