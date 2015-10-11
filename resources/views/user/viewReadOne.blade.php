@extends('app')

<!-- Title -->

@section('title', 'Profile')

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- User profile -->

	<div class='container'>

		<div class='card'>

			<div class='text-center'>
				<h2>{{ $user->name }}</h2>
			</div>

			<hr />

			<div>
				<p>
					Email:

					{{ $user->email }}
				</p>
			</div>

			<hr />

			<div>
				<p>
					Gender:

					{{ $user->gender }}
				</p>
			</div>

			<hr />

			<div>
				<p>
					Birthday:

					{{ $user->birthday }}
				</p>
			</div>

			<hr />

			<div class='text-center'>

				<img src='/uploads/{{ $user->image }}'>

				<hr />

				<form action='/user/{{ $user->id }}' method='post' enctype='multipart/form-data'>
					Select image to upload:
					<input name='image' type='file'>
					<input name='submit' class='btn btn-group btn-primary' type='submit' value='Upload Image'>
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
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-info' href='/user/{{ $user->id }}/edit'>Edit profile</a>

				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection