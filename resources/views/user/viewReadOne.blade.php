@extends('app')

<!-- Title -->

@section('title', 'Profile')

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- User profile -->

	<div class='container'>

		<article class='user-profile'>

			<h2 id='h2' class='centered'>
				{{ $user->name }}
			</h2>

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
			
		</article>

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
					<a id='button' href='/user/{{ $user->id }}/edit'><button class='btn btn-info'>Edit profile</button></a>
				</li>

				<li>
					<a id='button' href='/movies/create'><button class='btn btn-primary'>New Movie</button></a>
				</li>
			</ul>

		</div>

	</nav>

@endsection