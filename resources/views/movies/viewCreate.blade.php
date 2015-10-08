@extends('app')

<!-- Title -->

@section('title', 'Create a new movie')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- Create a new movie form -->

	<div class='container'>

		<div class='card'>

			<div class='text-center'>

				<h2>New Movie</h2>

				<hr />

				<form action='/movies' method='post'>
					<div class='form-group'>
						<input class='form-control' name='title' type='text' placeholder='Title (Required)'>
					</div>

					<div class='form-group'>
						<select id='genre' class='form-control' name='genres[]' multiple>
							@foreach ($genres as $genre)
								<option value='{{ $genre->id }}'>{{ $genre->name }}</option>
							@endforeach
						</select>
					</div>

					<div class='form-group'>
						<input class='form-control' name='release_date' type='date' placeholder='Release Date'>
					</div>

					<div class='form-group'>
						<select class='form-control' name='ratings'>
							@foreach ($ratings as $rating)
								<option value='{{ $rating->id }}'>{{ $rating->name }}</option>
							@endforeach
						</select>
					</div>

					<div class='form-group'>
						<input class='form-control' name='runtime' type='text' placeholder='Runtime'>
					</div>

					<div class='form-group'>
						<select id='director' class='form-control' name='directors[]' multiple>
							@foreach ($directors as $director)
								<option value='{{ $director->id }}'>{{ $director->name }}</option>
							@endforeach
						</select>
					</div>

					<div class='form-group'>
						<select id='writer' class='form-control' name='writers[]' multiple>
							@foreach ($writers as $writer)
								<option value='{{ $writer->id }}'>{{ $writer->name }}</option>
							@endforeach
						</select>
					</div>

					<div class='form-group'>
						<select id='cast' class='form-control' name='casts[]' multiple>
							@foreach ($casts as $cast)
								<option value='{{ $cast->id }}'>{{ $cast->name }}</option>
							@endforeach
						</select>
					</div>

					<div class='form-group'>
						<textarea class='form-control' name='synopsis' placeholder='Synopsis'></textarea>
					</div>

					<div class='form-group'>
						<select id='state' class='form-control' name='states[]' multiple>
							@foreach ($states as $state)
								<option value='{{ $state->id }}'>{{ $state->name }}</option>
							@endforeach
						</select>
					</div>
					
					<br />

					<div>
						<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Create Movie</button>
					</div>
				</form>

			</div>
			
		</div>

	</div>

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
		$('#state').select2({
			placeholder: 'State',
		});
	</script>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

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
				<li><a href='/states'>Labels</a></li>
			</ul>
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				<a class='btn btn-primary' href='/movies/create'>New Movie</a>
			</div>
			
		</div>

	</nav>

@endsection