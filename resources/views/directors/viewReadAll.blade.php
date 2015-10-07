@extends('app')

<!-- Title -->

@section('title', 'Directors')

<!-- Content -->

@section('content')

	<div class='container'>

		@foreach ($directors as $director)

			<article id='director'>

				<h2 id='h2' class='centered'>
					<a href='/directors/{{ $director->id }}'>{{ $director->name }}</a>
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
				<li><a href='/directors'>Directors</a></li>
			</ul>

			<ul class='nav navbar-nav navbar-right'>
				<li><a id='button' href='/movies/create'><button class='btn btn-primary'>New Movie</button></a></li>
			</ul>

		</div>

	</nav>

@endsection