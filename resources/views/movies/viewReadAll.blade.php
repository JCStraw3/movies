@extends('app')

<!-- Title -->

@section('title', 'Movies')

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- Movies -->

	@foreach ($movies as $movie)

		<article class='movie'>
			<h2>
				<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
			</h2>

			<div>
				@foreach ($movie->genres as $genre)
					{{ $genre->name }},
				@endforeach
			</div>

			<div>
				{{ $movie->release_date }}
			</div>

			<div>
				@foreach ($movie->ratings as $rating)
					{{ $rating->name }}
				@endforeach
			</div>

			<div>
				{{ $movie->runtime }}
			</div>

			<div>
				@foreach ($movie->directors as $director)
					{{ $director->name }},
				@endforeach
			</div>

			<div>
				@foreach ($movie->writers as $writer)
					{{ $writer->name }},
				@endforeach
			</div>

			<div>
				@foreach ($movie->casts as $cast)
					{{ $cast->name }},
				@endforeach
			</div>

			<div>
				{{ $movie->synopsis }}
			</div>
			
			<br />

			<form action='/movies/{{ $movie->id }}' method='post'>
				<input name='_method' type='hidden' value='delete'>
				<button type='submit'>Delete Movie</button>
			</form>
		</article>

	@endforeach

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