@extends('app')

<!-- Title -->

@section('title', 'Create a new director')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- Create a new director form -->

	<div class='container'>

		<div class='card'>

			<div class='text-center'>

				<h2>New Director</h2>

				<hr />

				<form action='/directors' method='post'>
					<div class='form-group'>
						<input class='form-control' name='name' type='text' placeholder='Name'>
					</div>
					
					<br />

					<div>
						<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Create Director</button>
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

			<a href='/directors'>Directors</a>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-primary' href='/directors/create'><span class='glyphicon glyphicon-plus'></span> Director</a>

				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection