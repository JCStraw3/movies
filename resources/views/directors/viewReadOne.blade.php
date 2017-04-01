@extends('app')

<!-- Title -->

@section('title')

	{{ $director->name }}

@endsection

<!-- Content -->

@section('content')

	<div class='card'>
		{{-- Delete director --}}
		<form class='delete-button pull-right' action='/directors/{{ $director->id }}' method='post'>
			<input name='_method' type='hidden' value='delete'>
			<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
		</form>
		
		{{-- Edit director --}}
		<a class='btn btn-info btn-xs pull-right' href='/directors/{{ $director->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

		<div class='clearfix'></div>

		<div class='text-center'>
			<h2>{{ $director->name }}</h2>
		</div>

		<hr />

		<div>
			@foreach ($director->movies as $movie)

				<br />

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

			<span class='hidden-xs'> | </span>

			<span class='count hidden-xs'>{{ $director->name }} has {{ count($director->movies) }} movies</span>

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