@extends('app')

<!-- Title -->

@section('title', 'Create a new label')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- Create a new label form -->

	<div class='card'>

		<div class='text-center'>

			<h2>New Label</h2>

			<hr />

			<form action='/labels' method='post'>
				<div class='form-group'>
					<input class='form-control' name='name' type='text' placeholder='Name'>
				</div>
				
				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Create Label</button>
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

			<a class='hidden-xs' href='/labels'>Labels</a>

			<form class='navbar-form hidden-xs' role='search' action='/search'>
				<div class='form-group'>
					<input class='form-control' name='q' type='text' placeholder='Search'>
				</div>
				<button class='btn' type='submit'><span class='glyphicon glyphicon-search search-icon'></span></button>
			</form>
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-5 col-sm-4 col-md-3 col-lg-3'>

			<div class='navbar-form'>
				{{-- Add new label --}}
				<a class='btn btn-primary' href='/labels/create'><span class='glyphicon glyphicon-plus'></span> Label</a>

				{{-- Add new movie --}}
				<a class='btn btn-primary hidden-xs' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection