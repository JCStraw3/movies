@extends('app')

@section('title', 'Profile')

@section('content')

	<h1>Hello, {{ $user->name }}</h1>

	<hr />

	@include('partials.flash')

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