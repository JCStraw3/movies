<nav id='navbar'>

	<div>

		<a href='/movies'>Movies</a>

		@if ($user)
			<a href='/user/{{ $user->id }}'>{{ $user->name }}</a>
		@endif

		@if ($user)
			<a href='/auth/logout'>Logout</a>
		@endif

	</div>

</nav>