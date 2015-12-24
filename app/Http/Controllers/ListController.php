<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\List;

use Auth;

class ListController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views

	// View page to create a list.

	// View page to read all lists.

	// View page to read one list.

	// View page to update a list.

// Actions

	// Create a list in the database.

	// Update a list in the database.

	// Delete a list from the database.

}