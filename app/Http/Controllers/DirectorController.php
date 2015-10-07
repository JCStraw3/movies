<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Director;

class DirectorController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View all directors.

	public function viewReadAll(){

		$directors = Director::orderBy('name', 'asc')->get();

		return view('directors.viewReadAll')
			->with('directors', $directors);

	}

	// View all movies attached to director.

	public function viewReadOne($id){

		$director = Director::findOrFail($id);

		return view('directors.viewReadOne')
			->with('director', $director);

	}

}