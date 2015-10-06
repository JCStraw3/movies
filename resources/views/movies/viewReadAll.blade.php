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

			<article id='movie'>

				<ul id='delete'>
					<form action='/movies/{{ $movie->id }}' method='post'>
						<input name='_method' type='hidden' value='delete'>
						<button type='submit' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove'></span></button>
					</form>
				</ul>

				<h2 id='h2' class='centered'>
					<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
				</h2>

				<hr />

				<div class='stats centered'>
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
				</div>

				<div class='genre centered'>
					<p>
						<span> | </span>

						@foreach ($movie->genres as $genre)
							<a href='/genres/{{ $genre->id }}'>{{ $genre->name }}</a>

							<span> | </span>
						@endforeach
					</p>
				</div>

				<hr />

				<div>
					<p>
						Director(s):

						@foreach ($movie->directors as $director)
							{{ $director->name }},
						@endforeach
					</p>
				</div>

				<div>
					<p>
						Writer(s):

						@foreach ($movie->writers as $writer)
							{{ $writer->name }},
						@endforeach
					</p>
				</div>

				<div>
					<p>
						Cast:

						@foreach ($movie->casts as $cast)
							{{ $cast->name }},
						@endforeach
					</p>
				</div>

				<hr />

				<div>
					{{ $movie->synopsis }}
				</div>
				
			</article>

		@endforeach

	</div>

	

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar' class='navbar navbar-inverse navbar-fixed-top'>

		<div class='container-fluid'>

			<ul class='nav navbar-nav navbar-right'>
				<li><a id='button' href='/movies/create'><button class='btn btn-primary'>New Movie</button></a></li>
			</ul>

		</div>

	</nav>

@endsection