<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Userlist;
use App\Movie;

use Auth;

use Uuid;

class UserlistController extends Controller {

// Middleware

	// Only logged in users can see the app.
	// If not logged in, redirected to login page.

	public function __construct(){
		$this->middleware('auth', [
			'except' => 'viewReadOnePublic'
			]);
	}

// Views

	// View page to create a list.

	public function viewCreate(){

		// Set logged in user into a variable.

		$user = Auth::user();

		// Find all movies belonging to the logged in user
		// And set into variable.

		$movies = Movie::where('user_id', '=', $user->id)
			->orderBy('title', 'asc')
			->get();

		// Return the create view with the movies variable.

		return view('userlists.viewCreate')
			->with('movies', $movies);

	}

	// View page to read all lists.

	public function viewReadAll(){

		// Set logged in user into a variable.

		$user = Auth::user();

		// Find all userlists belonging to the logged in user
		// And set into a variable.

		$userlists = Userlist::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		// Return userlist readAll view with userlists variable.

		return view('userlists.viewReadAll')
			->with('userlists', $userlists);

	}

	// View page to read one list.

	public function viewReadOne($id){

		// Set logged in user into a variable.

		$user = Auth::user();

		// Find the userlist with the passed through Id
		// That belongs to the logged in user
		// And set into a variable.

		$userlist = Userlist::where('user_id', '=', $user->id)
			->findOrFail($id);

		// Return userlist readOne view with userlists variable.

		return view('userlists.viewReadOne')
			->with('userlist', $userlist);

	}

	// View page to view a public list.

	public function viewReadOnePublic($id){

		// Find the userlist with the passed through Id
		// Where the userlist is set to public
		// And set into variable.

		$userlist = Userlist::where('public', '=', 1)
			->findOrFail($id);

		// Return public userlist readOne view with userlists variable.

		return view('userlists.viewReadOnePublic')
			->with('userlist', $userlist);

	}

	// View page to update a list.

	public function viewUpdate($id){

		// Set logged in user into a variable.

		$user = Auth::user();

		// Find the userlist with the passed through Id
		// That belongs to the logged in user
		// And set into a variable.

		$userlist = Userlist::where('user_id', '=', $user->id)
			->findOrFail($id);

		// Find all movies belonging to the logged in user
		// And set into variable.

		$movies = Movie::where('user_id', '=', $user->id)
			->orderBy('title', 'asc')
			->get();

		// Return userlist update view with userlists variable.

		return view('userlists.viewUpdate')
			->with('userlist', $userlist)
			->with('movies', $movies);

	}

// Actions

	// Create a list in the database.

	public function actionCreate(Requests\CreateUserlistRequest $request){

		// Generate uuid for id.

		$id = Uuid::generate(4);

		// Set the request into a variable.

		$userlist = new Userlist([
			'id' => $id,
			'name' => $request->name,
			'public' => $request->public,
			'description' => $request->description,
		]);

		// Save the request variable to the logged in user's userlist table.

		Auth::user()->userlists()->save($userlist);

		// Set userlist id as uuid for pivot table.

		$userlist->id = $id;

		// Attach movies to userlist via pivot table.

		$movies = $request->input('movies');

		if(!is_array($movies)){
			$movies = [];
		}

		$userlist->movies()->attach($movies);

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully created a list.');

		// Redirect to new userlist's readOne view.

		return redirect('/lists/'.$userlist->id);

	}

	// Update a list in the database.

	public function actionUpdate($id, Requests\UpdateUserlistRequest $request){

		// Find the userlist with the passed through Id and set into variable.

		$userlist = Userlist::findOrFail($id);

		// Update the userlist with the request data.

		$userlist->update([
			'name' => $request->name,
			'public' => $request->public,
			'description' => $request->description,
		]);

		// Sync the movies to the userlist via a pivot table.

		$movies = $request->input('movies');

		if(!is_array($movies)){
			$movies = [];
		}

		$userlist->movies()->sync($movies);

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully updated a list.');

		// Redirect to userlist's readOne view.

		return redirect('/lists/'.$id);

	}

	// Delete a list from the database.

	public function actionDelete($id){

		// Find the userlist with the passed through Id and set into variable.

		$userlist = Userlist::findOrFail($id);

		// Delete the userlist from the database.

		$userlist->delete($userlist);

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully deleted a list.');

		// Redirect to lists readAll view.

		return redirect('/lists');

	}

}