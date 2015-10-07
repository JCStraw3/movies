@extends('app')

<!-- Title -->

@section('title')

	{{ $writer->name }}

@endsection

<!-- Content -->

@section('content')

	<div class='container'>

		<article id='writer'>

			<h2 id='h2' class='centered'>
				{{ $writer->name }}
			</h2>

			<hr />

			<div>
				@foreach ($writer->movies as $movie)

					<br />

					<div>
						<h4>
							<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
						</h4>

						<p>{{ $movie->synopsis }}</p>
					</div>
				@endforeach
			</div>

		</article>

	</div>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav id='toolbar' class='navbar navbar-inverse navbar-fixed-top'>

		<div class='container-fluid'>

			<ul class='nav navbar-nav navbar-left'>
				<li><a href='/writers'>Writers</a></li>
			</ul>

			<ul class='nav navbar-nav navbar-right'>
				<li><a id='button' href='/movies/create'><button class='btn btn-primary'>New Movie</button></a></li>
			</ul>

		</div>

	</nav>

@endsection