@extends('app')

<!-- Title -->

@section('title', 'Create a list')

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- Create a new list form -->

	<div class='card'>

		<div class='text-center'>

			<h2>New List</h2>

			<hr />

			<form action='/lists' method='post'>
				<div class='form-group'>
					<input class='form-control' name='name' type='text' placeholder='Name'>
				</div>
				
				<div class='form-group'>
					<select class='form-control' name='public'>
						<option value='0'>Private</option>
						<option value='1'>Public</option>
					</select>
				</div>

				<div class='form-group'>
					<select id='movie' class='form-control' name='movies[]' multiple>
						@foreach($movies as $movie)
							<option value='{{ $movie->id }}'>{{ $movie->title }}</option>
						@endforeach
					</select>
				</div>

				<div>
					<textarea class='form-control' name='description' type='text' placeholder='Description'></textarea>
				</div>
				
				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Create List</button>
				</div>
			</form>

		</div>
		
	</div>

	{{-- Select 2 scripts --}}

	<script type='text/javascript'>
		$('#movie').select2({
			placeholder: 'Movie',
			tags: true,
		});
	</script>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

		<div class='nav navbar-nav navbar-left col-xs-8 col-sm-8 col-md-9 col-lg-10'>

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

			<a class='hidden-xs' href='/lists'>Lists</a>

			<form class='navbar-form hidden-xs' role='search' action='/search'>
				<div class='form-group'>
					<input class='form-control' name='q' type='text' placeholder='Search'>
				</div>
				<button class='btn' type='submit'><span class='glyphicon glyphicon-search search-icon'></span></button>
			</form>
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-4 col-sm-4 col-md-3 col-lg-2'>

			<div class='navbar-form'>
				{{-- Add new userlist --}}
				<a class='btn btn-primary' href='/lists/create'><span class='glyphicon glyphicon-plus'></span> List</a>

				{{-- Add new movie --}}
				<a class='btn btn-primary hidden-xs' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection