<nav class='navbar navbar-inverse navbar-fixed-top'>

	<div class='nav navbar-nav navbar-left'>
		<a href='/' class='navbar-brand'>Movies</a>

		{{-- Button when navbar is collapsed --}}
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>

	<div class='nav navbar-nav navbar-right'>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<div class='navbar-form'>

				@if ($user)
					<a href='/user/{{ $user->id }}'>{{ $user->name }}</a>
				@endif

				@if ($user)
					<a class='btn btn-danger' href='/auth/logout'>Logout</a>
				@endif

			</div>

		</div>

	</div>

</nav>