<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use Auth;

use Uuid;

class UserController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views.

	// View a user's profile.

	public function viewReadOne($id){

		$authuser = Auth::user();

		$user = User::findOrFail($id);

		if($authuser->id !== $user->id){
			return view('errors.403');
		}

		return view('user.viewReadOne')
			->with('user', $user);

	}

	// View page to update a user's profile.

	public function viewUpdate($id){

		$user = User::findOrFail($id);

		return view('user.viewUpdate')
			->with('user', $user);

	}

// Actions.

	// Update a user's information in the database.

	public function actionUpdate($id, Requests\UpdateUserRequest $request){

		$user = User::findOrFail($id);

		$user->update($request->all());

		\Session::flash('flash_message', 'You have successfully updated your profile.');

		return redirect('/user/'.$id);

	}

	// Upload an image.

	public function actionUploadImage($id, Requests\UploadImageRequest $request){

		$user = User::findOrFail($id);

		if(!$request->hasFile('image')){
			\Session::flash('flash_message', 'No file selected.');

			return redirect('/user/'.$id);
		}

		if(!$request->file('image')->isValid()){
			\Session::flash('flash_message', 'File is not valid.');

			return redirect('/user/'.$id);
		}

		$destinationPath = 'uploads';

		$extension = $request->file('image')->getClientOriginalExtension();

		$fileName = Uuid::generate(4).'.'.$extension;

		$request->file('image')->move($destinationPath, $fileName);

		$user->image = $fileName;

		$user->save();

		return redirect('/user/'.$id);

	}

}