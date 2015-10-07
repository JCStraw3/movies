@extends('app')

<!-- Title -->

@section('title')

	{{ $movie->title }}

@endsection

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- Movie -->

	<div class='container'>

		<div class='card'>

			<div class='text-center'>

				<h2>
					{{ $movie->title }}
				</h2>

				<hr />

				<p>
					<span> | </span>

					@foreach ($movie->ratings as $rating)
						<a href='/ratings/{{ $rating->id }}'>{{ $rating->name }}</a>
					@endforeach

					<span> | </span>

					{{ $movie->runtime }} min

					<span> | </span>

					{{ $movie->release_date }}

					<span> | </span>
				</p>

				<p>
					<span> | </span>

					@foreach ($movie->genres as $genre)
						<a href='/genres/{{ $genre->id }}'>{{ $genre->name }}</a>

						<span> | </span>
					@endforeach
				</p>
			</div>

			<hr />

			<div>
				<p>
					Director(s):

					@foreach ($movie->directors as $director)
						<a href='/directors/{{ $director->id }}'>{{ $director->name }}</a>,
					@endforeach
				</p>
			</div>

			<div>
				<p>
					Writer(s):

					@foreach ($movie->writers as $writer)
						<a href='/writers/{{ $writer->id }}'>{{ $writer->name }}</a>,
					@endforeach
				</p>
			</div>

			<div>
				<p>
					Cast:

					@foreach ($movie->casts as $cast)
						<a href='/cast/{{ $cast->id }}'>{{ $cast->name }}</a>,
					@endforeach
				</p>
			</div>

			<hr />

			<div>
				{{ $movie->synopsis }}
			</div>

			<br />

			<div>
				@foreach ($movie->states as $state)
					<a class='label label-primary pull-right' href='/states/{{ $state->id }}'>{{ $state->name }}</a>
				@endforeach
			</div>
			
			<br />
			
		</div>

	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

		<div class='nav navbar-nav navbar-left'>

			<div class='navbar-form'>
				<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
			</div>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-info' href='/movies/{{ $movie->id }}/edit'>Edit</a>

				<form action='/movies/{{ $movie->id }}' method='post'>
					<input name='_method' type='hidden' value='delete'>
					<button type='submit' class='btn btn-danger'>Delete</button>
				</form>

				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection