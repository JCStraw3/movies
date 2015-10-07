@extends('app')

<!-- Title -->

@section('title', 'Login')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- User login form -->

	<div class='container'>

		<div class='card'>

			<div class='text-center'>
				<h2>Login</h2>
			</div>

			<hr />

			<form action='/auth/login' method='post'>
				<div class='form-group'>
					<input class='form-control' name='email' type='email' placeholder='Email'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='password' type='password' placeholder='Password'>
				</div>

				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Login</button>
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