@extends('app')

<!-- Title -->

@section('title', 'Create a new writer')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- Create a new writer form -->

	<div class='container'>

		<div class='card'>

			<div class='text-center'>

				<h2>New Writer</h2>

				<hr />

				<form action='/writers' method='post'>
					<div class='form-group'>
						<input class='form-control' name='name' type='text' placeholder='Name'>
					</div>
					
					<br />

					<div>
						<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Create Writer</button>
					</div>
				</form>

			</div>
			
		</div>

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

			<a href='/writers'>Writers</a>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				{{-- Add new writer --}}
				<a class='btn btn-primary' href='/writers/create'><span class='glyphicon glyphicon-plus'></span> Writer</a>

				{{-- Add new movie --}}
				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection