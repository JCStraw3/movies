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
			
		</div>

	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-info' href='/user/{{ $user->id }}/edit'>Edit profile</a>

				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection