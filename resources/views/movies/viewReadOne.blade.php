@extends('app')

<!-- Title -->

@section('title')

	{{ $movie->title }}

@endsection

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- Movie -->

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

	<nav id='toolbar' class='navbar navbar-inverse navbar-fixed-top'>

		<div class='container-fluid'>

			<ul class='nav navbar-nav navbar-left'>
				<p class='navbar-text'>{{ $movie->title }}</p>
			</ul>

			<ul class='nav navbar-nav navbar-right'>
				<li>
					<a id='button' href='/movies/{{ $movie->id }}/edit'><button class='btn btn-primary'>Edit</button></a>
				</li>

				<li>
					<form action='/movies/{{ $movie->id }}' method='post'>
						<input name='_method' type='hidden' value='delete'>
						<button type='submit' class='btn btn-danger'>Delete</button>
					</form>
				</li>

				<li>
					<a id='button' href='/movies/create'><button class='btn btn-primary'>New Movie</button></a>
				</li>
			</ul>

		</div>

	</nav>

@endsection