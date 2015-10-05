@extends('app')

<!-- Title -->

@section('title', 'Profile')

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- User profile -->

	<div>
		{{ $user->name }}
	</div>

	<div>
		{{ $user->email }}
	</div>

	<div>
		{{ $user->gender }}
	</div>

	<div>
		{{ $user->birthday }}
	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar' class='navbar navbar-inverse navbar-fixed-top'>

		<div class='container-fluid'>

			<ul class='nav navbar-nav navbar-left'>
				<p class='navbar-text'>{{ $user->name }}</p>
			</ul>

			<ul class='nav navbar-nav navbar-right'>
				<li>
					<a id='button' href='/user/{{ $user->id }}/edit'><button class='btn btn-primary'>Edit profile</button></a>
				</li>

				<li>
					<a id='button' href='/movies/create'><button class='btn btn-primary'>New Movie</button></a>
				</li>
			</ul>

		</div>

	</nav>

@endsection