@extends('app')

<!-- Title -->

@section('title', 'Cast')

<!-- Content -->

@section('content')

	<div class='container'>

		@foreach ($casts as $cast)

			<article id='cast'>

				<h2 id='h2' class='centered'>
					<a href='/cast/{{ $cast->id }}'>{{ $cast->name }}</a>
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
				<li><a href='/cast'>Cast</a></li>
			</ul>

			<ul class='nav navbar-nav navbar-right'>
				<li><a id='button' href='/movies/create'><button class='btn btn-primary'>New Movie</button></a></li>
			</ul>

		</div>

	</nav>

@endsection