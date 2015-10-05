@extends('app')

<!-- Title -->

@section('title', 'Login')

<!-- Content -->

@section('content')

	<!-- User login form -->

	<form action='/auth/login' method='post'>
		<div>
			<input name='email' type='email' placeholder='Email'>
		</div>

		<div>
			<input name='password' type='password' placeholder='Password'>
		</div>

		<br />

		<div>
			<button type='submit'>Login</button>
		</div>
	</form>

	<!-- Errors -->

	@include('errors.list')

@endsection