@extends('app')

<!-- Title -->

@section('title')

	{{ $movie->title }}

@endsection

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- Movie -->

	<div class='card'>

		<form class='delete-button pull-right' action='/movies/{{ $movie->id }}' method='post'>
			<input class='movieDelete' name='_method' type='hidden' value='delete'>
			<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
		</form>

		<a class='btn btn-info btn-xs pull-right' href='/movies/{{ $movie->id }}/edit'><span class='glyphicon glyphicon-pencil'></span></a>

		<div class='clearfix'></div>

		<div class='text-center'>

			<h2>
				{{ $movie->title }}
			</h2>

			<p>
				<span class='glyphicon glyphicon-star star-icon'></span>
				{{ $movie->score }} / 10
			</p>

			<hr />

			@if($movie->note)
				<div>
					<button type='button' class='btn btn-xs btn-primary pull-right' data-toggle='modal' data-target='#{{ $movie->id }}'>
						<span class='glyphicon glyphicon-paperclip'></span>
					</button>
				</div>
			@endif

			<div class='clearfix'></div>

			<p>
				<span> | </span>

				@foreach ($movie->ratings as $rating)
					<a href='/ratings/{{ $rating->id }}'>{{ $rating->name }}</a>
				@endforeach

				<span> | </span>

				{{ $movie->runtime }} min

				<span> | </span>

				{{ $movie->release_date }}

				<span> | </span>
			</p>

			<p>
				<span> | </span>

				@foreach ($movie->genres as $genre)
					<a href='/genres/{{ $genre->id }}'>{{ $genre->name }}</a>

					<span> | </span>
				@endforeach
			</p>
		</div>

		<hr />

		<div class='media'>

			<div class='media-left'>

				@if($movie->image)
					<img class='media-object' src='/uploads/{{ $movie->image }}'>
				@endif
				
				<br />

				<form class='media-object-form' action='/movies/{{ $movie->id }}' method='post' enctype='multipart/form-data'>
					Select image to upload:
					<input name='image' type='file'>
					<input name='submit' class='btn btn-group btn-primary' type='submit' value='Upload Image'>
				</form>

			</div>

			<div class='media-body'>

				<div>
					<p>
						Director(s):

						@foreach ($movie->directors as $director)
							<a href='/directors/{{ $director->id }}'>{{ $director->name }}</a>,
						@endforeach
					</p>
				</div>

				<div>
					<p>
						Writer(s):

						@foreach ($movie->writers as $writer)
							<a href='/writers/{{ $writer->id }}'>{{ $writer->name }}</a>,
						@endforeach
					</p>
				</div>

				<div>
					<p>
						Cast:

						@foreach ($movie->casts as $cast)
							<a href='/cast/{{ $cast->id }}'>{{ $cast->name }}</a>,
						@endforeach
					</p>
				</div>

				<hr />

				<div>
					{{ $movie->synopsis }}
				</div>

				<br />

				<div>
					@foreach ($movie->labels as $label)
						<a class='label label-primary pull-right' href='/labels/{{ $label->id }}'>{{ $label->name }}</a>
					@endforeach
				</div>
				
				<br />

				<div class='clearfix'></div>

				@foreach($movie->userlists as $userlist)
					<a class='label label-success pull-right' href='/lists/{{ $userlist->id }}'>{{ $userlist->name }}</a>
				@endforeach

			</div>

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

@endsection

<!-- Toolbar -->

@section('toolbar')

	<nav class='toolbar navbar navbar-inverse navbar-fixed-top'>

		<div class='nav navbar-nav navbar-left col-xs-7 col-sm-10 col-md-10 col-lg-10'>

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
				
			<a class='hidden-xs' href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>

			<form class='navbar-form hidden-xs' role='search' action='/search'>
				<div class='form-group'>
					<input class='form-control' name='q' type='text' placeholder='Search'>
				</div>
				<button class='btn' type='submit'><span class='glyphicon glyphicon-search search-icon'></span></button>
			</form>
			
		</div>

		<div class='nav navbar-nav navbar-right col-xs-5 col-sm-2 col-md-2 col-lg-2'>

			<div class='navbar-form'>
				{{-- Add new movie --}}
				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection