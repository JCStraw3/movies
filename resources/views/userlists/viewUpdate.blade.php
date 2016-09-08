@extends('app')

<!-- Title -->

@section('title')

	Edit {{ $userlist->name }}

@endsection

<!-- Content -->

@section('content')

	<!-- Errors -->

	@include('errors.list')

	<!-- Create a new list form -->

	<div class='card'>
		{{-- Delete userlist --}}
		<form class='delete-button pull-right' action='/lists/{{ $userlist->id }}' method='post'>
			<input name='_method' type='hidden' value='delete'>
			<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
		</form>

		<div class='clearfix'></div>

		<div class='text-center'>

			<h2>Edit {{ $userlist->name }}</h2>

			<hr />

			<form action='/lists/{{ $userlist->id }}' method='post'>
				<div>
					<input name='_method' type='hidden' value='put'>
				</div>

				<div class='form-group'>
					<input class='form-control' name='name' type='text' value='{{ $userlist->name }}' placeholder='Name'>
				</div>
				
				<div class='form-group'>
					<select class='form-control' name='public'>
						<option value='0'>Private</option>
						<option value='1'>Public</option>
					</select>
				</div>

				<div class='form-group'>
					<select id='movie' class='form-control' name='movies[]' multiple>
						@if($userlist->movies)
							@foreach($userlist->movies as $movie)
								<option value='{{ $movie->id }}' selected>{{ $movie->title }}</option>
							@endforeach
						@endif

						@foreach($movies as $movie)
							<option value='{{ $movie->id }}'>{{ $movie->title }}</option>
						@endforeach
					</select>
				</div>

				<div>
					<textarea class='form-control' name='description' type='text' placeholder='Description'>{{ $userlist->description }}</textarea>
				</div>
				
				<br />

				<div>
					<button class='btn btn-group btn-group-justified btn-primary' type='submit'>Edit List</button>
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

			<a href='/lists'>Lists</a>

			<span class='hidden-xs'> | </span>

			<a class='count hidden-xs' href='/lists/{{ $userlist->id }}'>{{ $userlist->name }}</a>
			
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