@extends('app')

<!-- Title -->

@section('title', 'Cast')

<!-- Content -->

@section('content')

	@foreach ($casts as $cast)

		<div class='card cast'>

			<form class='delete-button pull-right castDeleteForm' action='/cast/{{ $cast->id }}' method='post'>
				<input class='castDelete' name='_method' type='hidden' value='delete'>
				<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
			</form>

			{{-- Edit cast --}}
			<a class='btn btn-info btn-xs pull-right' href='/cast/{{ $cast->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

			<div class='clearfix'></div>

			<div class='text-center'>
				<a href='/cast/{{ $cast->id }}'><h2>{{ $cast->name }}</h2></a>
			</div>

		</div>

	@endforeach

	{{-- Ajax delete cast --}}

	<script>
		$('.cast').submit(function(event){
			event.preventDefault();
			var cast = this;
			var action = $(this).find('.castDeleteForm').attr('action');
			var method = $(this).find('.castDelete').val();
			$.ajax({
				url: action,
				method: 'post',
				data: {
					_method: method,
				}
			})
			.done(function(){
				cast.remove();
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
				
			<a href='/cast'>Cast</a>
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-5 col-sm-4 col-md-3 col-lg-3'>

			<div class='navbar-form'>
				{{-- Add new cast --}}
				<a class='btn btn-primary' href='/cast/create'><span class='glyphicon glyphicon-plus'></span> Cast</a>

				{{-- Add new movie --}}
				<a class='btn btn-primary hidden-xs' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection