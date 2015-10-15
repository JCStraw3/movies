@extends('app')

<!-- Title -->

@section('title')

	Edit {{ $movie->title }}

@endsection

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- Update a movie form -->

	<div class='container'>

		<div class='card'>

			<div class='text-center'>
				<h2>Edit {{ $movie->title }}</h2>
			</div>

			<hr />

			<form action='/movies/{{ $movie->id }}' method='post'>
				<div>
					<input name='_method' type='hidden' value='put'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='title' type='text' value='{{ $movie->title }}' placeholder='Title (Required)'>
				</div>

				<div class='form-group'>
					<select id='genre' class='form-control' name='genres[]' multiple>
						@if($movie->genres)
							@foreach ($movie->genres as $genre)
								<option value='{{ $genre->id }}' selected>{{ $genre->name }}</option>
							@endforeach
						@endif

						@foreach ($genres as $genre)
							<option value='{{ $genre->id }}'>{{ $genre->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<input class='form-control' name='release_date' type='date' value='{{ $movie->release_date }}' placeholder='Release Date'>
				</div>

				<div class='form-group'>
					<select class='form-control' name='ratings[]'>
						@if($movie->ratings)
							@foreach ($movie->ratings as $rating)
								<option value='{{ $rating->id }}' selected>{{ $rating->name }}</option>
							@endforeach
						@endif

						@foreach ($ratings as $rating)
							<option value='{{ $rating->id }}'>{{ $rating->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<input class='form-control' name='runtime' type='text' value='{{ $movie->runtime }}' placeholder='Runtime'>
				</div>

				<div class='form-group'>
					<select id='director' class='form-control' name='directors[]' multiple>
						@if($movie->directors)
							@foreach ($movie->directors as $director)
								<option value='{{ $director->id }}' selected>{{ $director->name }}</option>
							@endforeach
						@endif

						@foreach ($directors as $director)
							<option value='{{ $director->id }}'>{{ $director->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<select id='writer' class='form-control' name='writers[]' multiple>
						@if($movie->writers)
							@foreach ($movie->writers as $writer)
								<option value='{{ $writer->id }}' selected>{{ $writer->name }}</option>
							@endforeach
						@endif

						@foreach ($writers as $writer)
							<option value='{{ $writer->id }}'>{{ $writer->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<select id='cast' class='form-control' name='casts[]' multiple>
						@if($movie->casts)
							@foreach ($movie->casts as $cast)
								<option value='{{ $cast->id }}' selected>{{ $cast->name }}</option>
							@endforeach
						@endif

						@foreach ($casts as $cast)
							<option value='{{ $cast->id }}'>{{ $cast->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<textarea class='form-control' name='synopsis' placeholder='Synopsis'>{{ $movie->synopsis }}</textarea>
				</div>

				<div class='form-group'>
					<select id='label' class='form-control' name='labels[]' multiple>
						@if($movie->labels)
							@foreach ($movie->labels as $label)
								<option value='{{ $label->id }}' selected>{{ $label->name }}</option>
							@endforeach
						@endif

						@foreach ($labels as $label)
							<option value='{{ $label->id }}'>{{ $label->name }}</option>
						@endforeach
					</select>
				</div>

				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Save</button>
				</div>
			</form>
			
		</div>

	</div>

	{{-- Select 2 scripts --}}

	<script type='text/javascript'>
		$('#genre').select2({
			placeholder: 'Genre',
		});
	</script>

	<script type='text/javascript'>
		$('#director').select2({
			placeholder: 'Director',
		});
	</script>

	<script type='text/javascript'>
		$('#writer').select2({
			placeholder: 'Writer',
		});
	</script>

	<script type='text/javascript'>
		$('#cast').select2({
			placeholder: 'Cast',
		});
	</script>

	<script type='text/javascript'>
		$('#label').select2({
			placeholder: 'Label',
		});
	</script>

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
				
			<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				{{-- Delete movie --}}
				<form action='/movies/{{ $movie->id }}' method='post'>
					<input name='_method' type='hidden' value='delete'>
					<button type='submit' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button>
				</form>

				{{-- Add new movie --}}
				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection