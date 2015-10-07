<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Writer;

class WriterController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View all writers.

	public function viewReadAll(){

		$writers = Writer::orderBy('name', 'asc')->get();

		return view('writers.viewReadAll')
			->with('writers', $writers);

	}

	// View all movies attached to writer.

	public function viewReadOne($id){

		$writer = Writer::findOrFail($id);

		return view('writers.viewReadOne')
			->with('writer', $writer);

	}

}
