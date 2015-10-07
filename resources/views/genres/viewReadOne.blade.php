@extends('app')

<!-- Title -->

@section('title')

	{{ $genre->name }}

@endsection

<!-- Content -->

@section('content')

	<div class='container'>

		<div class='card'>

			<div class='text-center'>
				<h2>{{ $genre->name }}</h2>
			</div>

			<hr />

			<div>
				@foreach ($genre->movies as $movie)

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

			<div class='navbar-form'>
				<a href='/genres'>Genres</a>
			</div>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection