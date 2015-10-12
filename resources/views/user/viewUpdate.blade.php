@extends('app')

<!-- Title -->

@section('title', 'Edit profile')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- User update form -->

	<div class='container'>

		<div class='card'>

			<div class='text-center'>
				<h2>Edit Profile</h2>
			</div>

			<hr />

			<form action='/user/{{ $user->id }}' method='post'>
				<div>
					<input name='_method' type='hidden' value='put'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='name' type='text' value='{{ $user->name }}' placeholder='Name'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='email' type='email' value='{{ $user->email }}' placeholder='Email'>
				</div>

				<div class='form-group'>
					<select class='form-control' name='gender'>
						<option value='female'>Female</option>
						<option value='male'>Male</option>
					</select>
				</div>

				<div class='form-group'>
					<input class='form-control' name='birthday' type='date' value='{{ $user->birthday }}' placeholder='Birthday'>
				</div>

				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Save</button>
				</div>
			</form>
			
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
				{{-- Add new movie --}}
				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection