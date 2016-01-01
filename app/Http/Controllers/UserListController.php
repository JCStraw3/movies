<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UserList;
use App\Movie;

use Auth;

class UserListController extends Controller {

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

	// View page to read one list.

	public function viewReadOne($id){

		$user = Auth::user();

		$userlist = UserList::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('userlists.viewReadOne')
			->with('user', $user)
			->with('userlist', $userlist);

	}

	// View page to update a list.

// Actions

	// Create a list in the database.

	public function actionCreate(Requests\CreateUserListRequest $request){

		$userlist = new UserList($request->all());

		Auth::user()->userlists()->save($userlist);

		\Session::flash('flash_message', 'You have successfully created a list.');

		return redirect('/lists/'.$userlist->id);

	}

	// Update a list in the database.

	// Delete a list from the database.

}