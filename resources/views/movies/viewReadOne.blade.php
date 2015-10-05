@extends('app')

<!-- Title of page -->

@section('title')

	{{ $movie->title }}

@endsection

<!-- Read one movie -->

@section('content')

	<h1>Movies</h1>

	<hr />

	@include('partials.flash')

	<article class='movie'>
		<h2>
			{{ $movie->title }}
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

		<button><a href='/movies/{{ $movie->id }}/edit'>Edit</a></button>

		<br />

		<br />

		<form action='/movies/{{ $movie->id }}' method='post'>
			<input name='_method' type='hidden' value='delete'>
			<button type='submit'>Delete</button>
		</form>
	</article>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar'>

		<div>

			<span>{{ $movie->title }}</span>

			<a href='/movies/create'><button>New Movie</button></a>

			<a href='/movies/{{ $movie->id }}/edit'><button>Edit</button></a>

			<form action='/movies/{{ $movie->id }}' method='post'>
				<input name='_method' type='hidden' value='delete'>
				<button type='submit'>Delete</button>
			</form>

		</div>

	</nav>

@endsection