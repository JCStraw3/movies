<nav class='navbar navbar-inverse navbar-fixed-top'>

	<div class='nav navbar-nav navbar-left'>

		<a href='/' class='navbar-brand'>Movies</a>

	</div>

	<div class='nav navbar-nav navbar-right'>

		<div class='navbar-form'>

			@if ($user)
				<a href='/user/{{ $user->id }}'>{{ $user->name }}</a>
			@endif

			@if ($user)
				<a class='btn btn-danger' href='/auth/logout'>Logout</a>
			@endif

		</div>

	</div>

</nav>