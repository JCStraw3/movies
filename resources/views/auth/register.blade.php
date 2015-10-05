@extends('app')

<!-- Title -->

@section('title', 'Register')

<!-- Content -->

@section('content')

	<!-- User register form -->

	<form action='/auth/register' method='post'>
		<div>
			<input name='name' type='text' placeholder='Name'>
		</div>

		<div>
			<input name='email' type='email' placeholder='Email'>
		</div>

		<div>
			<input name='password' type='password' placeholder='Password'>
		</div>

		<div>
			<input name='password_confirmation' type='password' placeholder='Confirm Password'>
		</div>

		<br />

		<div>
			<button type='submit'>Register</button>
		</div>
	</form>

	<!-- Errors -->

	@include('errors.list')

@endsection