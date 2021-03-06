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

	<div class='card'>

		<form class='delete-button pull-right' action='/movies/{{ $movie->id }}' method='post'>
			<input class='movieDelete' name='_method' type='hidden' value='delete'>
			<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
		</form>

		<div class='clearfix'></div>

		<div class='text-center'>
			<h2>Edit {{ $movie->title }}</h2>
		</div>

		<hr />

		<form id='update' action='/movies/{{ $movie->id }}' method='post'>
			<div>
				<input name='_method' type='hidden' value='put'>
			</div>

			<div class='form-group'>
				<input id='updateTitle' class='form-control' name='title' type='text' value='{{ $movie->title }}' placeholder='Title (Required)'>
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
				<input id='updateReleaseDate' class='form-control' name='release_date' type='date' value='{{ $movie->release_date }}' placeholder='Release Date'>
			</div>

			<div class='form-group'>
				<select id='rating' class='form-control' name='ratings[]' multiple>
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
				<input id='updateRuntime' class='form-control' name='runtime' type='text' value='{{ $movie->runtime }}' placeholder='Runtime'>
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
				<textarea id='updateSynopsis' class='form-control' name='synopsis' placeholder='Synopsis'>{{ $movie->synopsis }}</textarea>
			</div>

			<div class='form-group'>
				<select class='form-control' name='score'>
					@if($movie->score)
						<option value='{{ $movie->score }}' selected>{{ $movie->score }}</option>
					@endif

					<option value='No Score'>No Score</option>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
					<option value='6'>6</option>
					<option value='7'>7</option>
					<option value='8'>8</option>
					<option value='9'>9</option>
					<option value='10'>10</option>
				</select>
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

			<div class='form-group'>
				<textarea class='form-control' name='note' placeholder='Note'>{{ $movie->note }}</textarea>
			</div>

			<br />

			<div>
				<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Save</button>
			</div>
		</form>
		
	</div>

	{{-- Select 2 scripts --}}

	<script type='text/javascript'>
		$('#genre').select2({
			placeholder: 'Genre',
			tags: true,
		});
	</script>

	<script type='text/javascript'>
		$('#rating').select2({
			placeholder: 'Rating',
			tags: true,
		});
	</script>

	<script type='text/javascript'>
		$('#director').select2({
			placeholder: 'Director',
			tags: true,
		});
	</script>

	<script type='text/javascript'>
		$('#writer').select2({
			placeholder: 'Writer',
			tags: true,
		});
	</script>

	<script type='text/javascript'>
		$('#cast').select2({
			placeholder: 'Cast',
			tags: true,
		});
	</script>

	<script type='text/javascript'>
		$('#label').select2({
			placeholder: 'Label',
			tags: true,
		});
	</script>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

		<div class='nav navbar-nav navbar-left col-xs-7 col-sm-10 col-md-10 col-lg-10'>

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
				
			<a class='hidden-xs' href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>

			<form class='navbar-form hidden-xs' role='search' action='/search'>
				<div class='form-group'>
					<input class='form-control' name='q' type='text' placeholder='Search'>
				</div>
				<button class='btn' type='submit'><span class='glyphicon glyphicon-search search-icon'></span></button>
			</form>
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-5 col-sm-2 col-md-2 col-lg-2'>

			<div class='navbar-form'>
				{{-- Add new movie --}}
				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection