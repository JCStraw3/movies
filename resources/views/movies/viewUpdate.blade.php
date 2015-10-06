@extends('app')

<!-- Title -->

@section('title')

	Edit {{ $movie->title }}

@endsection

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- Update a movie form -->

	<div class='container'>

		<article id='form'>

			<h2 id='h2' class='centered'>Edit {{ $movie->title }}</h2>

			<hr />

			<form action='/movies/{{ $movie->id }}' method='post'>
				<div>
					<input name='_method' type='hidden' value='put'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='title' type='text' value='{{ $movie->title }}' placeholder='Title'>
				</div>

				<div class='form-group'>
					<select class='form-control' name='genres[]' multiple>
						@foreach ($genres as $genre)
							<option value='{{ $genre->id }}'>{{ $genre->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<input class='form-control' name='release_date' type='date' value='{{ $movie->release_date }}' placeholder='Release Date'>
				</div>

				<div class='form-group'>
					<select class='form-control' name='ratings[]'>
						@foreach ($ratings as $rating)
							<option value='{{ $rating->id }}'>{{ $rating->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<input class='form-control' name='runtime' type='text' value='{{ $movie->runtime }}' placeholder='Runtime'>
				</div>

				<div class='form-group'>
					<select class='form-control' name='directors[]' multiple>
						@foreach ($directors as $director)
							<option value='{{ $director->id }}'>{{ $director->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<select class='form-control' name='writers[]' multiple>
						@foreach ($writers as $writer)
							<option value='{{ $writer->id }}'>{{ $writer->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<select class='form-control' name='casts[]' multiple>
						@foreach ($casts as $cast)
							<option value='{{ $cast->id }}'>{{ $cast->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<textarea class='form-control' name='synopsis' placeholder='Synopsis'>{{ $movie->synopsis }}</textarea>
				</div>

				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Save</button>
				</div>
			</form>
			
		</article>

	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar' class='navbar navbar-inverse navbar-fixed-top'>

		<div class='container-fluid'>

			<ul class='nav navbar-nav navbar-left'>
				<p class='navbar-text'>{{ $movie->title }}</p>
			</ul>

			<ul class='nav navbar-nav navbar-right'>
				<li>
					<form action='/movies/{{ $movie->id }}' method='post'>
						<input name='_method' type='hidden' value='delete'>
						<button type='submit' class='btn btn-danger'>Delete</button>
					</form>
				</li>

				<li>
					<a id='button' href='/movies/create'><button class='btn btn-primary'>New Movie</button></a>
				</li>
			</ul>

		</div>

	</nav>

@endsection