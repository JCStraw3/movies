@extends('app')

<!-- Title -->

@section('title', 'Directors')

<!-- Content -->

@section('content')

	@foreach ($directors as $director)

		<div class='card director'>

			<form class='delete-button pull-right directorDeleteForm' action='/directors/{{ $director->id }}' method='post'>
				<input class='directorDelete' name='_method' type='hidden' value='delete'>
				<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
			</form>
		
			{{-- Edit director --}}
			<a class='btn btn-info btn-xs pull-right' href='/directors/{{ $director->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

			<div class='clearfix'></div>

			<div class='text-center'>
				<a href='/directors/{{ $director->id }}'><h2>{{ $director->name }}</h2></a>
			</div>

		</div>

	@endforeach

	{{-- Ajax delete director --}}

	<script>
		$('.director').submit(function(event){
			event.preventDefault();
			var director = this;
			var action = $(this).find('.directorDeleteForm').attr('action');
			var method = $(this).find('.directorDelete').val();
			$.ajax({
				url: action,
				method: 'post',
				data: {
					_method: method,
				}
			})
			.done(function(){
				director.remove();
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

			<a class='hidden-xs' href='/directors'>Directors</a>

			<form class='navbar-form hidden-xs' role='search' action='/search'>
				<div class='form-group'>
					<input class='form-control' name='q' type='text' placeholder='Search'>
				</div>
				<button class='btn' type='submit'><span class='glyphicon glyphicon-search search-icon'></span></button>
			</form>
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-5 col-sm-4 col-md-3 col-lg-3'>

			<div class='navbar-form'>
				{{-- Add new director --}}
				<a class='btn btn-primary' href='/directors/create'><span class='glyphicon glyphicon-plus'></span> Director</a>

				{{-- Add new movie --}}
				<a class='btn btn-primary hidden-xs' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection