@extends('app')

<!-- Title -->

@section('title')

	{{ $userlist->name }}

@endsection

<!-- Content -->

@section('content')

	<!-- Create a new list form -->

	<div class='card'>

		<div class='text-center'>
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

						<h4 class='media-heading'>
							<a href='/movies/{{ $movie->id }}'>{{ $movie->title }}</a>
						</h4>

						<p>{{ $movie->synopsis }}</p>

					</div>

				</div>

			@endforeach
		</div>
		
	</div>

@endsection