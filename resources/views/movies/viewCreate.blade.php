@extends('app')

<!-- Title -->

@section('title', 'Create a new movie')

<!-- Content -->

@section('content')

	<!-- Create a new movie form -->

	<form action='/movies' method='post'>
		<div>
			<input name='title' type='text' placeholder='Title'>
		</div>

		<div>
			<select name='genres[]' multiple>
				@foreach ($genres as $genre)
					<option value='{{ $genre->id }}'>{{ $genre->name }}</option>
				@endforeach
			</select>
		</div>

		<div>
			<input name='release_date' type='date' placeholder='Release Date'>
		</div>

		<div>
			<select name='ratings'>
				@foreach ($ratings as $rating)
					<option value='{{ $rating->id }}'>{{ $rating->name }}</option>
				@endforeach
			</select>
		</div>

		<div>
			<input name='runtime' type='text' placeholder='Runtime'>
		</div>

		<div>
			<select name='directors[]' multiple>
				@foreach ($directors as $director)
					<option value='{{ $director->id }}'>{{ $director->name }}</option>
				@endforeach
			</select>
		</div>

		<div>
			<select name='writers[]' multiple>
				@foreach ($writers as $writer)
					<option value='{{ $writer->id }}'>{{ $writer->name }}</option>
				@endforeach
			</select>
		</div>

		<div>
			<select name='casts[]' multiple>
				@foreach ($casts as $cast)
					<option value='{{ $cast->id }}'>{{ $cast->name }}</option>
				@endforeach
			</select>
		</div>

		<div>
			<textarea name='synopsis' placeholder='Synopsis'></textarea>
		</div>
		
		<br />

		<div>
			<button type='submit'>Create Movie</button>
		</div>
	</form>

	<!-- Errors -->

	@include('errors.list')

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar' class='navbar navbar-inverse navbar-fixed-top'>

		<div class='container-fluid'>

			<ul>
				<p class='navbar-text'>Create a new movie</p>
			</ul>

		</div>

	</nav>

@endsection