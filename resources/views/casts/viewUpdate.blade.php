@extends('app')

<!-- Title -->

@section('title')

	Edit {{ $cast->name }}

@endsection

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- Update a cast form -->

	<div class='card'>

		{{-- Delete cast --}}
		<form class='delete-button pull-right' action='/cast/{{ $cast->id }}' method='post'>
			<input name='_method' type='hidden' value='delete'>
			<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
		</form>

		<div class='clearfix'></div>

		<div class='text-center'>

			<h2>Edit {{ $cast->name }}</h2>

			<hr />

			<form action='/cast/{{ $cast->id }}' method='post'>
				<div>
					<input name='_method' type='hidden' value='put'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='name' type='text' value='{{ $cast->name }}' placeholder='Name'>
				</div>
				
				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Edit Cast</button>
				</div>
			</form>

		</div>
		
	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

		<div class='nav navbar-nav navbar-left col-xs-7 col-sm-8 col-md-9 col-lg-9'>

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

			<a class='hidden-xs' href='/cast'>Cast</a>

			<form class='navbar-form hidden-xs' role='search' action='/search'>
				<div class='form-group'>
					<input class='form-control' name='q' type='text' placeholder='Search'>
				</div>
				<button class='btn' type='submit'><span class='glyphicon glyphicon-search search-icon'></span></button>
			</form>
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-5 col-sm-4 col-md-3 col-lg-3'>

			<div class='navbar-form'>				
				{{-- Add new cast --}}
				<a class='btn btn-primary' href='/cast/create'><span class='glyphicon glyphicon-plus'></span> Cast</a>

				{{-- Add new movie --}}
				<a class='btn btn-primary hidden-xs' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection