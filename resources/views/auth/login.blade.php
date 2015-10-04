@extends('app')

@section('title', 'Login')

@section('content')

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

	@include('errors.list')

@endsection