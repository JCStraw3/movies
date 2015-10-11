<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Label;

use Auth;

class LabelController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View the create page.

	public function viewCreate(){

		$user = Auth::user();

		return view('labels.viewCreate')
			->with('user', $user);

	}

	// View all labels.

	public function viewReadAll(){

		$user = Auth::user();

		$labels = Label::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		return view('labels.viewReadAll')
			->with('labels', $labels);

	}

	// View all movies attached to label.

	public function viewReadOne($id){

		$user = Auth::user();

		$label = Label::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('labels.viewReadOne')
			->with('label', $label);

	}

	// View page to update a label.

	public function viewUpdate($id){

		$user = Auth::user();

		$label = Label::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('labels.viewUpdate')
			->with('label', $label);

	}

// Actions

	// Create a label in the database.

	public function actionCreate(Requests\CreateLabelRequest $request){

		$label = new Label($request->all());

		Auth::user()->labels()->save($label);

		\Session::flash('flash_message', 'You have successfully created a label.');

		return redirect('/labels/'.$label->id);

	}

	// Update a label in the database.

	public function actionUpdate($id, Requests\UpdateLabelRequest $request){

		$user = Auth::user();

		$label = Label::where('user_id', '=', $user->id)
			->findOrFail($id);

		$label->update($request->all());

		\Session::flash('flash_message', 'You have successfully updated a label.');

		return redirect('/labels/'.$label->id);

	}

	// Delete a label from the database.

	public function actionDelete($id){

		$user = Auth::user();

		$label = Label::where('user_id', '=', $user->id)
			->findOrFail($id);

		$label->delete($label);

		\Session::flash('flash_message', 'You have successfully deleted a label.');

		return redirect('labels');

	}

}