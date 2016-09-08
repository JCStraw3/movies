@extends('app')

<!-- Title -->

@section('title', 'Labels')

<!-- Content -->

@section('content')

	@foreach ($labels as $label)

		<div class='card labelLabel'>

			<form class='delete-button pull-right labelDeleteForm' action='/labels/{{ $label->id }}' method='post'>
				<input class='labelDelete' name='_method' type='hidden' value='delete'>
				<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
			</form>
		
			{{-- Edit label --}}
			<a class='btn btn-info btn-xs pull-right' href='/labels/{{ $label->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

			<div class='clearfix'></div>

			<div class='text-center'>
				<a href='/labels/{{ $label->id }}'><h2>{{ $label->name }}</h2></a>
			</div>

		</div>

	@endforeach

	{{-- Ajax delete label --}}

	<script>
		$('.labelLabel').submit(function(event){
			event.preventDefault();
			var labelLabel = this;
			var action = $(this).find('.labelDeleteForm').attr('action');
			var method = $(this).find('.labelDelete').val();
			$.ajax({
				url: action,
				method: 'post',
				data: {
					_method: method,
				}
			})
			.done(function(){
				labelLabel.remove();
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

			<a class='hidden-xs' href='/labels'>Labels</a>
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-5 col-sm-4 col-md-3 col-lg-3'>

			<div class='navbar-form'>
				{{-- Add new label --}}
				<a class='btn btn-primary' href='/labels/create'><span class='glyphicon glyphicon-plus'></span> Label</a>

				{{-- Add new movie --}}
				<a class='btn btn-primary hidden-xs' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection