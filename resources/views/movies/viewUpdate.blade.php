@extends('app')

<!-- Title -->

@section('title')

	Edit {{ $movie->title }}

@endsection

<!-- Content -->

@section('content')

	<!-- Update a movie form -->

	<form action='/movies/{{ $movie->id }}' method='post'>
		<div>
			<input name='_method' type='hidden' value='put'>
		</div>

		<div>
			<input name='title' type='text' value='{{ $movie->title }}' placeholder='Title'>
		</div>

		<div>
			<select name='genres[]' multiple>
				@foreach ($genres as $genre)
					<option value='{{ $genre->id }}'>{{ $genre->name }}</option>
				@endforeach
			</select>
		</div>

		<div>
			<input name='release_date' type='date' value='{{ $movie->release_date }}' placeholder='Release Date'>
		</div>

		<div>
			<select name='ratings[]'>
				@foreach ($ratings as $rating)
					<option value='{{ $rating->id }}'>{{ $rating->name }}</option>
				@endforeach
			</select>
		</div>

		<div>
			<input name='runtime' type='text' value='{{ $movie->runtime }}' placeholder='Runtime'>
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
			<input name='synopsis' type='text' value='{{ $movie->synopsis }}' placeholder='Synopsis'>
		</div>

		<br />

		<div>
			<button type='submit'>Save</button>
		</div>
	</form>

	<form action='/movies/{{ $movie->id }}' method='post'>
		<input name='_method' type='hidden' value='delete'>
		<button type='submit'>Delete Movie</button>
	</form>

	<!-- Errors -->

	@include('errors.list')

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar'>

		<div>

			<span>{{ $movie->title }}</span>

			<a href='/movies/create'><button>New Movie</button></a>

			<form action='/movies/{{ $movie->id }}' method='post'>
				<input name='_method' type='hidden' value='delete'>
				<button type='submit'>Delete</button>
			</form>

		</div>

	</nav>

@endsection