<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Writer;

use Auth;

class WriterController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View the create page.

	public function viewCreate(){

		$user = Auth::user();

		return view('writers.viewCreate')
			->with('user', $user);

	}

	// View all writers.

	public function viewReadAll(){

		$user = Auth::user();

		$writers = Writer::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		return view('writers.viewReadAll')
			->with('writers', $writers);

	}

	// View all movies attached to writer.

	public function viewReadOne($id){

		$user = Auth::user();

		$writer = Writer::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('writers.viewReadOne')
			->with('writer', $writer);

	}

	// View page to update a writer.

	public function viewUpdate($id){

		$user = Auth::user();

		$writer = Writer::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('writers.viewUpdate')
			->with('writer', $writer);

	}

// Actions

	// Create a writer in the database.

	public function actionCreate(Requests\CreateWriterRequest $request){

		$writer = new Writer($request->all());

		Auth::user()->writers()->save($writer);

		\Session::flash('flash_message', 'You have successfully created a writer.');

		return redirect('/writers/'.$writer->id);

	}

	// Update a writer in the database.

	public function actionUpdate($id, Requests\UpdateWriterRequest $request){

		$user = Auth::user();

		$writer = Writer::where('user_id', '=', $user->id)
			->findOrFail($id);

		$writer->update($request->all());

		\Session::flash('flash_message', 'You have successfully updated a writer.');

		return redirect('/writers/'.$writer->id);

	}

	// Delete a writer from the database.

	public function actionDelete($id){

		$user = Auth::user();

		$writer = Writer::where('user_id', '=', $user->id)
			->findOrFail($id);

		$writer->delete($writer);

		\Session::flash('flash_message', 'You have successfully deleted a writer.');

		return redirect('writers');

	}

}