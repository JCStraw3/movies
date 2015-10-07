@extends('app')

<!-- Title -->

@section('title', 'Directors')

<!-- Content -->

@section('content')

	<div class='container'>

		@foreach ($directors as $director)

			<div class='card'>

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

			<div class='navbar-form'>
				<a href='/directors'>Directors</a>
			</div>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection