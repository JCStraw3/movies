@extends('app')

<!-- Title -->

@section('title', 'Welcome')

<!-- Content -->

@section('content')

	<div class='container'>

		<article>

			<h1 id='h1' class='centered'>
				Movies
			</h1>

			<hr />

			<br />

			<div>
				<a id='button' href='/auth/register'>
					<button class='btn btn-group btn-group-justified btn-primary'>Register</button>
				</a>
			</div>

			<br />

			<div>
				<a id='button' href='/auth/login'>
					<button class='btn btn-group btn-group-justified btn-primary'>Login</button>
				</a>
			</div>

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