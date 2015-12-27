@extends('app')

<!-- Title -->

@section('title')

	{{ $cast->name }}

@endsection

<!-- Content -->

@section('content')

	<div class='card'>

		<div class='text-center'>
			<h2>{{ $cast->name }}</h2>
		</div>

		<hr />

		<div>
			@foreach ($cast->movies as $movie)

				<br />

				<div class='media'>

					@if($movie->image)

						<div class='media-left'>
							<img class='media-object-small' src='/uploads/{{ $movie->image }}'>
						</div>

					@endif

					<div class='media-body'>

						<h4 class='media-heading'>
							<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
						</h4>

						<p>{{ $movie->synopsis }}</p>

						@foreach($movie->labels as $label)
							<a class='label label-primary pull-right' href='/labels/{{ $label->id }}'>{{ $label->name }}</a>
						@endforeach

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

			<a href='/cast'>Cast</a>

			<span> | </span>

			<span class='count'>{{ $cast->name }} has {{ count($cast->movies) }} movies</span>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				{{-- Edit cast --}}
				<a class='btn btn-info' href='/cast/{{ $cast->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

				{{-- Delete cast --}}
				<form action='/cast/{{ $cast->id }}' method='post'>
					<input name='_method' type='hidden' value='delete'>
					<button type='submit' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button>
				</form>
				
				{{-- Add new cast --}}
				<a class='btn btn-primary' href='/cast/create'><span class='glyphicon glyphicon-plus'></span> Cast</a>

				{{-- Add new movie --}}
				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection