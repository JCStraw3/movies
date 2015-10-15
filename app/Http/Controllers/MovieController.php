<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Movie;
use App\Genre;
use App\Rating;
use App\Director;
use App\Writer;
use App\Cast;
use App\Label;

use Auth;

use Uuid;

class MovieController extends Controller {

// Middleware

	// Only authenticated users can see certain pages.

	public function __construct(){
		$this->middleware('auth');
	}

// Views.

	// View page to create a new movie.

	public function viewCreate(){

		$user = Auth::user();

		$genres = Genre::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		$ratings = Rating::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		$directors = Director::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		$writers = Writer::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		$casts = Cast::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		$labels = Label::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		return view('movies.viewCreate')
			->with('genres', $genres)
			->with('ratings', $ratings)
			->with('directors', $directors)
			->with('writers', $writers)
			->with('casts', $casts)
			->with('labels', $labels)
			->with('user', $user);

	}

	// View all movies attached to the logged in user.

	public function viewReadAll(){

		$user = Auth::user();

		$movies = Movie::where('user_id', '=', $user->id)
			->orderBy('title', 'asc')
			->get();

		return view('movies.viewReadAll')
			->with('movies', $movies);

	}

	// View single movie's profile.

	public function viewReadOne($id){

		$user = Auth::user();

		$movie = Movie::where('user_id', '=', $user->id)
			->findOrFail($id);

		return view('movies.viewReadOne')
			->with('movie', $movie);

	}

	public function viewUpdate($id){

		$user = Auth::user();

		$movie = Movie::where('user_id', '=', $user->id)
			->findOrFail($id);

		$genres = Genre::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		$ratings = Rating::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		$directors = Director::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		$writers = Writer::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		$casts = Cast::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		$labels = Label::where('user_id', '=', $user->id)
			->orderBy('name', 'asc')
			->get();

		return view('movies.viewUpdate')
			->with('movie', $movie)
			->with('genres', $genres)
			->with('ratings', $ratings)
			->with('directors', $directors)
			->with('writers', $writers)
			->with('casts', $casts)
			->with('labels', $labels);

	}

// Actions.

	// Create a movie in the database.

	public function actionCreate(Requests\CreateMovieRequest $request){

		// Set request into movie variable.

		$movie = new Movie($request->all());

		// Saving movie variable to authenticated user.

		Auth::user()->movies()->save($movie);

		// Attaching genres to movies via pivot table.

		$genres = $request->input('genres');

		$genreAttach = $this->checkGenres($genres);

		$movie->genres()->attach($genreAttach);

		// Attaching ratings to movies via pivot table.

		$ratings = $request->input('ratings');

		$movie->ratings()->attach($ratings);

		// Attaching directors to movies via pivot table.

		$directors = $request->input('directors');

		$directorAttach = $this->checkDirectors($directors);

		$movie->directors()->attach($directorAttach);

		// Attaching writers to movies via pivot table.

		$writers = $request->input('writers');

		$writerAttach = $this->checkWriters($writers);

		$movie->writers()->attach($writerAttach);

		// Attaching cast to movies via pivot table.

		$casts = $request->input('casts');

		$castAttach = $this->checkCasts($casts);

		$movie->casts()->attach($castAttach);

		// Attaching labels to movies via pivot table

		$labels = $request->input('labels');

		$labelAttach = $this->checkLabels($labels);

		$movie->labels()->attach($labelAttach);

		// Sending flash message.

		\Session::flash('flash_message', 'You have successfully created a movie.');

		// Redirecting to movies page.

		return redirect('/movies/'.$movie->id);

	}

	// Update a movie's information in the database.

	public function actionUpdate($id, Requests\UpdateMovieRequest $request){

		// Set authenticated user into user variable.

		$user = Auth::user();

		// Find by id the id sent via the form and set into movie variable.

		$movie = Movie::where('user_id', '=', $user->id)
			->findOrFail($id);

		// Save request to the database.

		$movie->update($request->all());

		// Syncing genres to movies via pivot table.

		$genres = $request->input('genres');

		if(!is_array($genres)){
			$genres = [];
		}

		$genreSync = $this->checkGenres($genres);

		$movie->genres()->sync($genreSync);

		// Syncing ratings to movies via pivot table.

		$ratings = $request->input('ratings');

		if(!is_array($ratings)){
			$ratings = [];
		}

		$ratingSync = $this->checkRatings($ratings);

		$movie->ratings()->sync($ratingSync);

		// Syncing directors to movies via pivot table.

		$directors = $request->input('directors');

		if(!is_array($directors)){
			$directors = [];
		}

		$directorSync = $this->checkDirectors($directors);

		$movie->directors()->sync($directorSync);

		// Syncing writers to movies via pivot table.

		$writers = $request->input('writers');

		if(!is_array($writers)){
			$writers = [];
		}

		$writerSync = $this->checkWriters($writers);

		$movie->writers()->sync($writerSync);

		// Syncing cast to movies via pivot table.

		$casts = $request->input('casts');

		if(!is_array($casts)){
			$casts = [];
		}

		$castSync = $this->checkCasts($casts);

		$movie->casts()->sync($castSync);

		// Syncing labels to movies via pivot table

		$labels = $request->input('labels');

		if(!is_array($labels)){
			$labels = [];
		}

		$labelSync = $this->checkLabels($labels);

		$movie->labels()->sync($labelSync);

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully updated this movie.');

		// Redirecting to movies page.

		return redirect('/movies/'.$movie->id);

	}

	// Upload a movie poster.

	public function actionUploadImage($id, Requests\UploadImageRequest $request){

		$user = Auth::user();

		$movie = Movie::where('user_id', '=', $user->id)
			->findOrFail($id);

		if(!$request->hasFile('image')){
			\Session::flash('flash_message', 'No file selected.');

			return redirect('/movies/'.$id);
		}

		if(!$request->file('image')->isValid()){
			\Session::flash('flash_message', 'File is not valid.');

			return redirect('/movies/'.$id);
		}

		$destinationPath = 'uploads';

		$extension = $request->file('image')->getClientOriginalExtension();

		$fileName = Uuid::generate(4).'.'.$extension;

		$request->file('image')->move($destinationPath, $fileName);

		$movie->image = $fileName;

		$movie->save();

		return redirect('/movies/'.$id);

	}

	// Delete a movie from the database.

	public function actionDelete($id){

		// Set authenticated user into user variable.

		$user = Auth::user();

		// Find by id the id sent via the form and set into movie variable.

		$movie = Movie::where('user_id', '=', $user->id)
			->findOrFail($id);

		// Delete movie from database.

		$movie->delete($movie);

		// Send flash message.

		\Session::flash('flash_message', 'You have successfully deleted a movie.');

		// Redirect to movies page.

		return redirect('movies');

	}

// Private functions.

	// Add genre to database if it does not exist.

	private function checkGenres($genres){

		$user = Auth::user();

		$currentGenres = array_filter($genres, 'is_numeric');

		$newGenres = array_diff($genres, $currentGenres);

		foreach($newGenres as $newGenre){

			$genre = Genre::create([
				'name' => $newGenre,
				]);

			$user->genres()->save($genre);

			$currentGenres[] = $genre->id;

		}

		return $currentGenres;

	}

	// Add rating to database if it does not exist.

	private function checkRatings($ratings){

		$user = Auth::user();

		$currentRatings = array_filter($ratings, 'is_numeric');

		$newRatings = array_diff($ratings, $currentRatings);

		foreach($newRatings as $newRating){

			$rating = Rating::create([
				'name' => $newRating,
				]);

			$user->ratings()->save($rating);

			$currentRatings[] = $rating->id;

		}

		return $currentRatings;

	}

	// Add director to database if it does not exist.

	private function checkDirectors($directors){

		$user = Auth::user();

		$currentDirectors = array_filter($directors, 'is_numeric');

		$newDirectors = array_diff($directors, $currentDirectors);

		foreach($newDirectors as $newDirector){

			$director = Director::create([
				'name' => $newDirector,
				]);

			$user->directors()->save($director);

			$currentDirectors[] = $director->id;

		}

		return $currentDirectors;

	}

	// Add writer to database if it does not exist.

	private function checkWriters($writers){

		$user = Auth::user();

		$currentWriters = array_filter($writers, 'is_numeric');

		$newWriters = array_diff($writers, $currentWriters);

		foreach($newWriters as $newWriter){

			$writer = Writer::create([
				'name' => $newWriter,
				]);

			$user->writers()->save($writer);

			$currentWriters[] = $writer->id;

		}

		return $currentWriters;

	}

	// Add cast to database if it does not exist.

	private function checkCasts($casts){

		$user = Auth::user();

		$currentCasts = array_filter($casts, 'is_numeric');

		$newCasts = array_diff($casts, $currentCasts);

		foreach($newCasts as $newCast){

			$cast = Cast::create([
				'name' => $newCast,
				]);

			$user->casts()->save($cast);

			$currentCasts[] = $cast->id;

		}

		return $currentCasts;

	}

	// Add label to database if it does not exist.

	private function checkLabels($labels){

		$user = Auth::user();

		$currentLabels = array_filter($labels, 'is_numeric');

		$newLabels = array_diff($labels, $currentLabels);

		foreach($newLabels as $newLabel){

			$label = Label::create([
				'name' => $newLabel,
				]);

			$user->labels()->save($label);

			$currentLabels[] = $label->id;

		}

		return $currentLabels;

	}
	
}