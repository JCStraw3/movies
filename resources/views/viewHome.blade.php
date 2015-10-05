@extends('app')

@section('title', 'Welcome')

@section('content')

	<h1>Welcome to movies</h1>

	<div>

		<a href='auth/register'>
			<button>Register</button>
		</a>

	</div>

	<br />

	<div>

		<a href='auth/login'>
			<button>Login</button>
		</a>

	</div>

@endsection