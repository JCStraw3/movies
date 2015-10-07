@extends('app')

<!-- Title -->

@section('title', 'Writers')

<!-- Content -->

@section('content')

	<div class='container'>

		@foreach ($writers as $writer)

			<div class='card'>

				<div class='text-center'>
					<a href='/writers/{{ $writer->id }}'><h2>{{ $writer->name }}</h2></a>
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
				<a href='/writers'>Writers</a>
			</div>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection