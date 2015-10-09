@extends('app')

<!-- Title -->

@section('title', 'Directors')

<!-- Content -->

@section('content')

	<div class='container'>

		@foreach ($directors as $director)

			<div class='card'>

				<form class='pull-right' action='/directors/{{ $director->id }}' method='post'>
					<input name='_method' type='hidden' value='delete'>
					<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
				</form>

				<div class='clearfix'></div>

				<div class='text-center'>
					<a href='/directors/{{ $director->id }}'><h2>{{ $director->name }}</h2></a>
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

			<a href='/directors'>Directors</a>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-primary' href='/directors/create'>New Director</a>

				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection