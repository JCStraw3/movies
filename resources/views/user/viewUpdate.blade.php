@extends('app')

<!-- Title -->

@section('title', 'Edit profile')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- User update form -->

	<div class='container'>

		<article id='form'>

			<h2 id='h2' class='centered'>Edit Profile</h2>

			<hr />

			<form action='/user/{{ $user->id }}' method='post'>
				<div>
					<input name='_method' type='hidden' value='put'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='name' type='text' value='{{ $user->name }}' placeholder='Name'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='email' type='email' value='{{ $user->email }}' placeholder='Email'>
				</div>

				<div class='form-group'>
					<select class='form-control' name='gender'>
						<option value='female'>Female</option>
						<option value='male'>Male</option>
					</select>
				</div>

				<div class='form-control' class='form-group'>
					<input name='birthday' type='date' value='{{ $user->birthday }}' placeholder='Birthday'>
				</div>

				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Save</button>
				</div>
			</form>
			
		</article>

	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar' class='navbar navbar-inverse navbar-fixed-top'>

		<div class='container-fluid'>

			<ul class='nav navbar-nav navbar-left'>
				<p class='navbar-text'>{{ $user->name }}</p>
			</ul>

			<ul class='nav navbar-nav navbar-right'>
				<li>
					<a id='button' href='/movies/create'><button class='btn btn-primary'>New Movie</button></a>
				</li>
			</ul>

		</div>

	</nav>

@endsection