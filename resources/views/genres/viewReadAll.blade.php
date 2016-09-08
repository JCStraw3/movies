@extends('app')

<!-- Title -->

@section('title', 'Genres')

<!-- Content -->

@section('content')

	@foreach ($genres as $genre)

		<div class='card genre'>

			<form class='delete-button pull-right genreDeleteForm' action='/genres/{{ $genre->id }}' method='post'>
				<input class='genreDelete' name='_method' type='hidden' value='delete'>
				<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
			</form>
		
			{{-- Edit genre --}}
			<a class='btn btn-info btn-xs pull-right' href='/genres/{{ $genre->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

			<div class='clearfix'></div>

			<div class='text-center'>
				<a href='/genres/{{ $genre->id }}'><h2>{{ $genre->name }}</h2></a>
			</div>

		</div>

	@endforeach

	{{-- Ajax delete genre --}}

	<script>
		$('.genre').submit(function(event){
			event.preventDefault();
			var genre = this;
			var action = $(this).find('.genreDeleteForm').attr('action');
			var method = $(this).find('.genreDelete').val();
			$.ajax({
				url: action,
				method: 'post',
				data: {
					_method: method,
				}
			})
			.done(function(){
				genre.remove();
			});
		});
	</script>

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

		<div class='nav navbar-nav navbar-left col-xs-7 col-sm-8 col-md-9 col-lg-9'>

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

			<a class='hidden-xs' href='/genres'>Genres</a>

			<form class='navbar-form hidden-xs' role='search' action='/search'>
				<div class='form-group'>
					<input class='form-control' name='q' type='text' placeholder='Search'>
				</div>
				<button class='btn' type='submit'><span class='glyphicon glyphicon-search search-icon'></span></button>
			</form>
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-5 col-sm-4 col-md-3 col-lg-3'>
			
			<div class='navbar-form'>
				{{-- Add new genre --}}
				<a class='btn btn-primary' href='/genres/create'><span class='glyphicon glyphicon-plus'></span> Genre</a>

				{{-- Add new movie --}}
				<a class='btn btn-primary hidden-xs' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection