@extends('app')

<!-- Title -->

@section('title', 'Welcome')

<!-- Content -->

@section('content')

	<div class='container'>

		<div class='card'>

			<div class='text-center'>
				<h1>Movies</h1>
			</div>

			<hr />

			<br />

			<div>
				<a class='btn btn-group btn-group-justified btn-primary' href='/auth/login'>Login</a>
			</div>

			<br />

			<div>
				<a class='btn btn-group btn-group-justified btn-primary' href='/auth/register'>Register</a>
			</div>

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