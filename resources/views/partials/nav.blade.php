<nav class='navbar navbar-inverse navbar-fixed-top'>

	<div class='nav navbar-nav navbar-left col-xs-4 col-sm-9 col-lg-10'>

		<a href='/' class='navbar-brand'>Movies</a>

	</div>

	<div class='nav navbar-nav navbar-right col-xs-8 col-sm-3 col-lg-2'>

		<div class='navbar-form'>

			@if ($user)
				<a href='/user/{{ $user->id }}'>{{ $user->name }}</a>
			@endif

			@if ($user)
				<a class='btn btn-danger' href='/auth/logout'><span class='glyphicon glyphicon-off'></span></a>
			@endif

		</div>

	</div>

</nav>