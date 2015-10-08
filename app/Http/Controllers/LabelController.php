<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Label;

class LabelController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View all labels.

	public function viewReadAll(){

		$labels = Label::orderBy('id', 'asc')->get();

		return view('labels.viewReadAll')
			->with('labels', $labels);

	}

	// View all movies attached to label.

	public function viewReadOne($id){

		$label = Label::findOrFail($id);

		return view('labels.viewReadOne')
			->with('label', $label);

	}

}