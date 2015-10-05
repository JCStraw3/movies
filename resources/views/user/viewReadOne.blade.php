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

	<nav id='toolbar'>

		<div>

			<span>{{ $user->name }}</span>

			<a href='/movies/create'><button>New Movie</button></a>

			<a href='/user/{{ $user->id }}/edit'><button>Edit profile</button></a>

		</div>

	</nav>

@endsection