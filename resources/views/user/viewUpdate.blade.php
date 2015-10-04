@extends('app')

@section('title', 'Edit profile')

@section('content')

	<h1>Hello, {{ $user->name }}</h1>

	<hr />

	<form action='/user/{{ $user->id }}' method='post'>
		<div>
			<input name='_method' type='hidden' value='put'>
		</div>

		<div>
			<input name='name' type='text' value='{{ $user->name }}' placeholder='Name'>
		</div>

		<div>
			<input name='email' type='email' value='{{ $user->email }}' placeholder='Email'>
		</div>

		<div>
			<select name='gender'>
				<option value='female'>Female</option>
				<option value='male'>Male</option>
			</select>
		</div>

		<div>
			<input name='birthday' type='date' value='{{ $user->birthday }}' placeholder='Birthday'>
		</div>

		<br />

		<div>
			<button type='submit'>Save</button>
		</div>
	</form>

@endsection