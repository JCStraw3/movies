@extends('app')

<!-- Title -->

@section('title', 'Ratings')

<!-- Content -->

@section('content')

	<div class='container'>

		@foreach ($ratings as $rating)

			<div class='card'>

				<div class='text-center'>
					<a href='/ratings/{{ $rating->id }}'><h2>{{ $rating->name }}</h2></a>
				</div>

			</div>

		@endforeach

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
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-primary' href='/ratings/create'>New Rating</a>
				
				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection