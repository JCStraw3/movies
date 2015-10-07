<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cast;

class CastController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View all casts.

	public function viewReadAll(){

		$casts = Cast::orderBy('name', 'asc')->get();

		return view('casts.viewReadAll')
			->with('casts', $casts);

	}

	// View all movies attached to a cast.

	public function viewReadOne($id){

		$cast = Cast::findOrFail($id);

		return view('casts.viewReadOne')
			->with('cast', $cast);

	}

}