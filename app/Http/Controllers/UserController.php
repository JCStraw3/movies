<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller {

// Views.

	// View a user's profile.

	public function viewReadOne($id){

		$user = User::findOrFail($id);

		return view('user.viewReadOne')
			->with('user', $user);

	}

	// View page to update a user's profile.

	public function viewUpdate($id){

		$user = User::findOrFail($id);

		return view('user.viewUpdate')
			->with('user', $user);

	}

	// View image page

	public function viewImage(){

		// $user = User::findOrFail($id);

		return view('user.viewImage');
			// ->with('user', $user);

	}

// Actions.

	// Update a user's information in the database.

	public function actionUpdate($id, Requests\UpdateUserRequest $request){

		$user = User::findOrFail($id);

		$user->update($request->all());

		\Session::flash('flash_message', 'You have successfully updated your profile.');

		return view('user.viewReadOne')
			->with('user', $user);

	}

	// Upload an image.

	public function actionUploadImage($id, Requests\UploadImageRequest $request){

		$user = User::findOrFail($id);

		if(!$request->hasFile('image')){
			\Session::flash('flash_message', 'No file selected.');

		}

		if(!$request->file('image')->isValid()){
			\Session::flash('flash_message', 'File is not valid.');
		}

		$destinationPath = 'uploads';

		$extention = $request->file('image')->getClientOriginalExtension();

		$fileName = rand(11111,99999).'.'.$extention;

		$request->file('image')->move($destinationPath, $fileName);

		$user->image = $fileName;

		$user->save();

		var_dump($user->image);

		// return view('user.viewReadOne')
		// 	->with('user', $user);

	}

}