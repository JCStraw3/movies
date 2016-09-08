@extends('app')

<!-- Title -->

@section('title', 'Create a new movie')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- Create a new movie form -->

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
					<select id='rating' class='form-control' name='ratings'>
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
					<select class='form-control' name='score'>
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
						@foreach ($labels as $label)
							<option value='{{ $label->id }}'>{{ $label->name }}</option>
						@endforeach
					</select>
				</div>

				<div class='form-group'>
					<textarea class='form-control' name='note' placeholder='Note'></textarea>
				</div>
				
				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Create Movie</button>
				</div>
			</form>

		</div>
		
	</div>

	{{-- Select 2 scripts --}}

	<script type='text/javascript'>
		$('#genre').select2({
			placeholder: 'Genre',
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
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-5 col-sm-2 col-md-2 col-lg-2'>

			<div class='navbar-form'>
				{{-- Add new movie --}}
				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection