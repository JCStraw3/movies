@extends('app')

<!-- Title -->

@section('title', 'States')

<!-- Content -->

@section('content')

	<div class='container'>

		@foreach ($states as $state)

			<div class='card'>

				<div class='text-center'>
					<a href='/states/{{ $state->id }}'><h2>{{ $state->name }}</h2></a>
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
				<a href='/states'>States</a>
			</div>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection