<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\State;

class StateController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View all states.

	public function viewReadAll(){

		$states = State::orderBy('id', 'asc')->get();

		return view('states.viewReadAll')
			->with('states', $states);

	}

	// View all movies attached to state.

	public function viewReadOne($id){

		$state = State::findOrFail($id);

		return view('states.viewReadOne')
			->with('state', $state);

	}

}