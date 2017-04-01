@extends('app')

<!-- Title -->

@section('title', 'Lists')

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- Create a new list form -->

	@foreach($userlists as $userlist)

		<div class='card userlist'>

			<form class='delete-button pull-right userlistDeleteForm' action='/lists/{{ $userlist->id }}' method='post'>
				<input class='userlistDelete' name='_method' type='hidden' value='delete'>
				<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
			</form>
		
			{{-- Edit userlist --}}
			<a class='btn btn-info btn-xs pull-right' href='/lists/{{ $userlist->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

			<div class='clearfix'></div>

			<div class='text-center'>
				<a href='/lists/{{ $userlist->id }}'><h2>{{ $userlist->name }}</h2></a>
			</div>

			<div>
				{{ $userlist->description }}
			</div>
			
		</div>

	@endforeach

	{{-- Ajax delete userlist --}}

	<script>
		$('.userlist').submit(function(event){
			event.preventDefault();
			var userlist = this;
			var action = $(this).find('.userlistDeleteForm').attr('action');
			var method = $(this).find('.userlistDelete').val();
			$.ajax({
				url: action,
				method: 'post',
				data: {
					_method: method,
				}
			})
			.done(function(){
				userlist.remove();
			});
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

			<span class='hidden-xs'> | </span>

			<span class='count hidden-xs'>You have {{ count($userlists) }} lists</span>

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