@extends('app')

<!-- Title -->

@section('title')

	{{ $userlist->name }}

@endsection

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- Create a new list form -->

	<div class='card'>

		<div class='text-center'>
			<h2>{{ $userlist->name }}</h2>
		</div>

		<hr />

		<div>
			@foreach($userlist->movies as $movies)

				<div class='media'>

					@if($movie->image)
						<div class='media-left'>
							<a class='media-object-small' href='/uploads/{{ $movie->image }}'></a>
						</div>
					@endif

					<div class='media-body'>

						@if($movie->note)
							<a tabindex='0' class='btn btn-xs btn-primary pull-right' role='button' data-toggle='popover' data-trigger='focus' data-content='{{ $movie->note }}'><span class='glyphicon glyphicon-paperclip'></span></a>
						@endif

						<h4 class='media-heading'>
							<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
						</h4>

						<p>{{ $movie->sysopsis }}</p>

						@foreach($movie->labels as $label)
							<a class='label label-primary pull-right' href='/labels/{{ $label->id }}'>{{ $label->name }}</a>
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

		<div class='nav navbar-nav navbar-left'>

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

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				{{-- Add new movie --}}
				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection