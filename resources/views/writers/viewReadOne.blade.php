@extends('app')

<!-- Title -->

@section('title')

	{{ $writer->name }}

@endsection

<!-- Content -->

@section('content')

	<div class='container'>

		<div class='card'>

			<div class='text-center'>
				<h2>{{ $writer->name }}</h2>
			</div>

			<hr />

			<div>
				@foreach ($writer->movies as $movie)

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

			<a href='/writers'>Writers</a>

			<span> | </span>

			<span class='count'>{{ $writer->name }} has {{ count($writer->movies) }} movies</span>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-info' href='/writers/{{ $writer->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

				<form action='/writers/{{ $writer->id }}' method='post'>
					<input name='_method' type='hidden' value='delete'>
					<button type='submit' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button>
				</form>
				
				<a class='btn btn-primary' href='/writers/create'><span class='glyphicon glyphicon-plus'></span> Writer</a>

				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection