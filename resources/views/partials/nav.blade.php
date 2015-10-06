<nav id='navbar' class='navbar navbar-inverse navbar-fixed-top'>

	<div class='container-fluid'>

		<ul class='nav navbar-nav navbar-left'>
			<li><a href='/' class='navbar-brand'>Movies</a></li>
		</ul>

		<ul class='nav navbar-nav navbar-right'>
			<li>
				@if ($user)
					<a href='/user/{{ $user->id }}'>{{ $user->name }}</a>
				@endif
			</li>

			<li>
				@if ($user)
					<a id='button' href='/auth/logout'><button class='btn btn-danger'>Logout</button></a>
				@endif
			</li>
		</ul>

	</div>

</nav>