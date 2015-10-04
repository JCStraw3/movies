@extends('app')

@section('title', 'Movies')

@section('content')

	<h1>Movies</h1>

	<hr />

	@if (Session::has('flash_message'))

		{{ Session::get('flash_message') }}

	@endif

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