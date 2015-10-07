@extends('app')

<!-- Title -->

@section('title', 'Edit profile')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- User update form -->

	<div class='container'>

		<div class='card'>

			<div class='text-center'>
				<h2>Edit Profile</h2>
			</div>

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

				<div class='form-group'>
					<input class='form-control' name='birthday' type='date' value='{{ $user->birthday }}' placeholder='Birthday'>
				</div>

				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Save</button>
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
				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection