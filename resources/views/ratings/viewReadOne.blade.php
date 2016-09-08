@extends('app')

<!-- Title -->

@section('title', 'Ratings')

<!-- Content -->

@section('content')

	<div class='card'>
		{{-- Delete rating --}}
		<form class='delete-button pull-right' action='/ratings/{{ $rating->id }}' method='post'>
			<input name='_method' type='hidden' value='delete'>
			<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
		</form>
		
		{{-- Edit rating --}}
		<a class='btn btn-info btn-xs pull-right' href='/ratings/{{ $rating->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

		<div class='clearfix'></div>

		<div class='text-center'>
			<h2>{{ $rating->name }}</h2>
		</div>

		<hr />

		<div>
			@foreach ($rating->movies as $movie)

				<br />

				<div class='media'>

					@if($movie->image)

						<div class='media-left'>
							<img class='media-object-small' src='/uploads/{{ $movie->image }}'>
						</div>

					@endif

					<div class='media-body'>

						@if($movie->note)
							<a tabindex='0' class='btn btn-xs btn-primary pull-right' role='button' data-toggle='popover' data-trigger='focus' data-content='{{ $movie->note }}'><span class='glyphicon glyphicon-paperclip'></span></a>
						@endif

						<h4 class='media-heading'>
							<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
						</h4>

						<p>{{ $movie->synopsis }}</p>

						@foreach($movie->labels as $label)
							<a class='label label-primary pull-right' href='/labels/{{ $label->id }}'>{{ $label->name }}</a>
						@endforeach

						<div class='clearfix'></div>

						@foreach($movie->userlists as $userlist)
							<a class='label label-success pull-right' href='/lists/{{ $userlist->id }}'>{{ $userlist->name }}</a>
						@endforeach

					</div>

				</div>
				
			@endforeach
		</div>

	</div>

	{{-- Popover Script --}}

	<script>
		$(function () {
			$('[data-toggle="popover"]').popover()
		})
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

			<a class='hidden-xs' href='/ratings'>Ratings</a>

			<span class='hidden-xs'> | </span>

			<span class='count hidden-xs'>{{ $rating->name }} has {{ count($rating->movies) }} movies</span>

			<form class='navbar-form hidden-xs' role='search' action='/search'>
				<div class='form-group'>
					<input class='form-control' name='q' type='text' placeholder='Search'>
				</div>
				<button class='btn' type='submit'><span class='glyphicon glyphicon-search search-icon'></span></button>
			</form>
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-5 col-sm-4 col-md-3 col-lg-3'>

			<div class='navbar-form'>				
				{{-- Add new rating --}}
				<a class='btn btn-primary' href='/ratings/create'><span class='glyphicon glyphicon-plus'></span> Rating</a>

				{{-- Add new movie --}}
				<a class='btn btn-primary hidden-xs' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection