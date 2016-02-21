</strong>@extends('app')

<!-- Title -->

@section('title', 'Movies')

<!-- Content -->

@section('content')

	<!-- Flash messaging -->

	@include('partials.flash')

	<!-- Movies -->

	@foreach ($movies as $movie)

		<div class='card movie'>

			<form class='delete-button pull-right movieDeleteForm' action='/movies/{{ $movie->id }}' method='post'>
				<input class='movieDelete' name='_method' type='hidden' value='delete'>
				<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></button>
			</form>

			<div class='clearfix'></div>

			<div class='text-center'>
				<a href='/movies/{{ $movie->id }}'><h2>{{ $movie->title }}</h2></a>
			
				<hr />

				@if($movie->note)
					<div>
						<a tabindex='0' class='btn btn-xs btn-primary pull-right' role='button' data-toggle='popover' data-trigger='focus' data-content='{{ $movie->note }}'><span class='glyphicon glyphicon-paperclip'></span></a>
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

				@if($movie->image)

					<div class='media-left'>
						<img class='media-object' src='/uploads/{{ $movie->image }}'>
					</div>

				@endif

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

					<div>
						@foreach($movie->userlists as $userlist)
							<a class='label label-success pull-right' href='/lists/{{ $userlist->id }}'>{{ $userlist->name }}</a>
						@endforeach
					</div>

				</div>

			</div>
			
		</div>

	@endforeach

	{{-- Pagination links --}}

	<footer>
		{!! $movies->render() !!}
	</footer>

	{{-- Popover Script --}}

	<script>
		$(function () {
			$('[data-toggle="popover"]').popover()
		})
	</script>

	{{-- Ajax delete movie --}}

	<script>
		$('.movie').submit(function(event){
			event.preventDefault();
			var movie = this;
			var action = $(this).find('.movieDeleteForm').attr('action');
			var method = $(this).find('.movieDelete').val();
			$.ajax({
				url: action,
				method: 'post',
				data: {
					_method: method,
				}
			})
			.done(function(){
				movie.remove();
			});
		});
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

			<span>You have {{ count($movies) }} movies</span>
			
		</div>

		<div class='nav navbar-nav navbar-right'>

			<div class='navbar-form'>
				{{-- Add new movie --}}
				<a class='btn btn-primary' href='/movies/create'><span class='glyphicon glyphicon-plus'></span> Movie</a>
			</div>
			
		</div>

	</nav>

@endsection