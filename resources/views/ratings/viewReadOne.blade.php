@extends('app')

<!-- Title -->

@section('title', 'Ratings')

<!-- Content -->

@section('content')

	<div class='container'>

		<div class='card'>

			<div class='text-center'>
				<h2>{{ $rating->name }}</h2>
			</div>

			<hr />

			<div>
				@foreach ($rating->movies as $movie)

					<br />

					<div>
						<h4>
							<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
						</h4>

						<p>{{ $movie->synopsis }}</p>
					</div>
				@endforeach
			</div>

		</div>

	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

		<div class='nav navbar-nav navbar-left'>

			<div class='navbar-form btn-group'>
				<button class='btn btn-info dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
					Menu <span class='caret'></span>
				</button>
				<ul class='dropdown-menu'>
					<li><a href='/movies'>Movies</a></li>
					<li><a href='/genres'>Genres</a></li>
					<li><a href='/ratings'>Ratings</a></li>
					<li><a href='/directors'>Directors</a></li>
					<li><a href='/writers'>Writers</a></li>
					<li><a href='/cast'>Cast</a></li>
					<li><a href='/labels'>Labels</a></li>
				</ul>
			</div>

			<a href='/ratings'>Ratings</a>

			<span> | </span>

			<span class='count'>{{ $rating->name }} has {{ count($rating->movies) }} movies</span>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-info' href='/ratings/{{ $rating->id }}/edit'>Edit Rating</a>

				<form action='/ratings/{{ $rating->id }}' method='post'>
					<input name='_method' type='hidden' value='delete'>
					<button type='submit' class='btn btn-danger'>Delete</button>
				</form>
				
				<a class='btn btn-primary' href='/ratings/create'>New Rating</a>

				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection