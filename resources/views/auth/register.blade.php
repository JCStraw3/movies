@extends('app')

<!-- Title -->

@section('title', 'Register')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- User register form -->

	<div class='container'>

		<div class='card'>

			<div class='text-center'>
				<h2>Register</h2>
			</div>

			<hr />

			<form action='/auth/register' method='post'>
				<div class='form-group'>
					<input class='form-control' name='name' type='text' placeholder='Name'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='email' type='email' placeholder='Email'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='password' type='password' placeholder='Password'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='password_confirmation' type='password' placeholder='Confirm Password'>
				</div>

				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Register</button>
				</div>
			</form>
			
		</div>

	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-primary' href='/auth/login'>Login</a>

				<a class='btn btn-primary' href='/auth/register'>Register</a>
			</div>
			
		</div>

	</nav>

@endsection