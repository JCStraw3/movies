@extends('app')

<!-- Title -->

@section('title')

	{{ $genre->name }}

@endsection

<!-- Content -->

@section('content')

	<div class='card'>

		<div class='text-center'>
			<h2>{{ $genre->name }}</h2>
		</div>

		<hr />

		<div>
			@foreach ($genre->movies as $movie)

				<br />

				<div class='media'>

					@if($movie->image)

						<div class='media-left'>
							<img class='media-object-small' src='/uploads/{{ $movie->image }}'>
						</div>

					@endif

					<div class='media-body'>

						<div>
							<h4 class='media-heading'>
								<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
							</h4>

							<p>{{ $movie->synopsis }}</p>
						</div>

					</div>

				</div>

			@endforeach
		</div>

	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

		<div class='nav navbar-nav navbar-left'>

			<div class='navbar-form btn-group'>
				<button class='btn btn-info dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
					Menu <span class='caret'></span>
				</button>
				<ul class='dropdown-menu'>
					<li><a href='/movies'>Movies</a></li>
					<li><a href='/genres'>Genres</a></li>
					<li><a href='/ratings'>Ratings</a></li>
					<li><a href='/directors'>Directors</a></li>
					<li><a href='/writers'>Writers</a></li>
					<li><a href='/cast'>Cast</a></li>
					<li><a href='/labels'>Labels</a></li>
				</ul>
			</div>

			<a class='hidden-xs' href='/genres'>Genres</a>

			<span class='hidden-xs'> | </span>

			<span class='count hidden-xs'>{{ $genre->name }} has {{ count($genre->movies) }} movies</span>

			{{-- Button when navbar is collapsed --}}
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toolbar-collapse" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class="collapse navbar-collapse" id="toolbar-collapse">

				<div class='navbar-form'>
					{{-- Edit genre --}}
					<a class='btn btn-info' href='/genres/{{ $genre->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

					{{-- Delete genre --}}
					<form action='/genres/{{ $genre->id }}' method='post'>
						<input name='_method' type='hidden' value='delete'>
						<button type='submit' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button>
					</form>
					
					{{-- Add new genre --}}
					<a class='btn btn-primary' href='/genres/create'><span class='glyphicon glyphicon-plus'></span> Genre</a>

					{{-- Add new movie --}}
					<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
				</div>

			</div>
			
		</div>

	</nav>

@endsection