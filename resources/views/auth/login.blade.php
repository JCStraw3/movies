@extends('app')

<!-- Title -->

@section('title', 'Login')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- User login form -->

	<div class='container'>

		<article id='form'>

			<h2 id='h2' class='centered'>Login</h2>

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
			
		</article>

	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar' class='navbar navbar-inverse navbar-fixed-top'>

		<div class='container-fluid'>

			<ul class='nav navbar-nav navbar-right'>
				<li>
					<a id='button' href='/auth/login'><button class='btn btn-primary'>Login</button></a>
				</li>

				<li>
					<a id='button' href='/auth/register'><button class='btn btn-primary'>Register</button></a>
				</li>
			</ul>

		</div>

	</nav>

@endsection