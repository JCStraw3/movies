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
		{{-- Delete userlist --}}
		<form class='delete-button pull-right' action='/lists/{{ $userlist->id }}' method='post'>
			<input name='_method' type='hidden' value='delete'>
			<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
		</form>

		{{-- Edit userlist --}}
		<a class='btn btn-info btn-xs pull-right' href='/lists/{{ $userlist->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

		<div class='clearfix'></div>

		<div class='text-center'>
			@if($userlist->public === 1)
				<div class='pull-right'>
					<span class='glyphicon glyphicon-eye-open'></span>

					<a href='/lists/{{ $userlist->id }}/p'>Public view</a>
				</div>

				<div class='clearfix'></div>
			@endif

			<h2>{{ $userlist->name }}</h2>
		</div>

		<hr />

		<div>
			@foreach($userlist->movies as $movie)

				<div class='media'>

					@if($movie->image)
						<div class='media-left'>
							<img class='media-object-small' src='/uploads/{{ $movie->image }}'>
						</div>
					@endif

					<div class='media-body'>

						@if($movie->note)
							<div>
								<button type='button' class='btn btn-xs btn-primary pull-right' data-toggle='modal' data-target='#{{ $movie->id }}'>
									<span class='glyphicon glyphicon-paperclip'></span>
								</button>
							</div>
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

				{{-- Note Modal --}}

				<div class='modal fade' id='{{ $movie->id }}' tabindex='-1' role='dialog' aria-labelledby='noteModal'>

					<div class='modal-dialog' role='document'>

						<div class='modal-content'>

							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								
								<h4 class='modal-title' id='noteModal'>{{ $movie->title }}</h4>
							</div>

							<div class='modal-body'>
								{{ $movie->note }}
							</div>

						</div>

					</div>

				</div>

			@endforeach
		</div>
		
	</div>

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

			<span class='count hidden-xs'>{{ $userlist->name }} has {{ count($userlist->movies) }} movies</span>

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