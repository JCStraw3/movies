@extends('app')

<!-- Title -->

@section('title', 'Movies')

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- Movies -->

	<div class='container'>

		@foreach ($movies as $movie)

			<div class='card'>

				<form class='pull-right' action='/movies/{{ $movie->id }}' method='post'>
					<input name='_method' type='hidden' value='delete'>
					<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
				</form>

				<div class='clearfix'></div>

				<div class='text-center'>
					<a href='/movies/{{ $movie->id }}'><h2>{{ $movie->title }}</h2></a>
				
					<hr />

					<p>
						<span> | </span>

						@foreach ($movie->ratings as $rating)
							<a href='/ratings/{{ $rating->id }}'>{{ $rating->name }}</a>
						@endforeach

						<span> | </span>

						{{ $movie->runtime }} min

						<span> | </span>

						{{ $movie->release_date }}

						<span> | </span>
					</p>

					<p>
						<span> | </span>

						@foreach ($movie->genres as $genre)
							<a href='/genres/{{ $genre->id }}'>{{ $genre->name }}</a>

							<span> | </span>
						@endforeach
					</p>
				</div>

				<hr />

				<div class='media'>

					@if($movie->image)

						<div class='media-left'>
							<img class='img' src='/uploads/{{ $movie->image }}'>
						</div>

					@endif

					<div class='media-body'>

						<div>
							<p>
								Director(s):

								@foreach ($movie->directors as $director)
									<a href='/directors/{{ $director->id }}'>{{ $director->name }}</a>,
								@endforeach
							</p>
						</div>

						<div>
							<p>
								Writer(s):

								@foreach ($movie->writers as $writer)
									<a href='/writers/{{ $writer->id }}'>{{ $writer->name }}</a>,
								@endforeach
							</p>
						</div>

						<div>
							<p>
								Cast:

								@foreach ($movie->casts as $cast)
									<a href='/cast/{{ $cast->id }}'>{{ $cast->name }}</a>,
								@endforeach
							</p>
						</div>

						<hr />

						<div>
							{{ $movie->synopsis }}
						</div>

						<br />

						<div>
							@foreach ($movie->labels as $label)
								<a class='label label-primary pull-right' href='/labels/{{ $label->id }}'>{{ $label->name }}</a>
							@endforeach
						</div>
						
						<br />

					</div>

				</div>
				
			</div>

		@endforeach

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

			<span>You have {{ count($movies) }} movies</span>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection