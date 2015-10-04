@extends('app')

@section('title', 'Profile')

@section('content')

	<h1>Hello, {{ $user->name }}</h1>

	<hr />

	@if (Session::has('flash_message'))

		{{ Session::get('flash_message') }}

	@endif

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