@extends('app')

<!-- Title -->

@section('title', 'Genres')

<!-- Content -->

@section('content')

	<div class='container'>

		@foreach ($genres as $genre)

			<article id='genre'>

				<h2 id='h2' class='centered'>
					<a href='/genres/{{ $genre->id }}'>{{ $genre->name }}</a>
				</h2>

			</article>

		@endforeach

	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar' class='navbar navbar-inverse navbar-fixed-top'>

		<div class='container-fluid'>

			<ul class='nav navbar-nav navbar-left'>
				<p class='navbar-text'>Genres</p>
			</ul>

			<ul class='nav navbar-nav navbar-right'>
				<li><a id='button' href='/movies/create'><button class='btn btn-primary'>New Movie</button></a></li>
			</ul>

		</div>

	</nav>

@endsection