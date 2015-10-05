@extends('app')

@section('title', 'Create a new movie')

@section('content')

	<h1>Create a new movie</h1>

	<hr />

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

	@include('errors.list')

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar'>

		<div>

			<span>Create a new movie</span>

		</div>

	</nav>

@endsection