<html>
<head>
	<title>Movies</title>
</head>
<body>

	<h1><?php echo $movie->title; ?></h1>

	<form action='/movies/<?php echo $movie->id; ?>' method='post'>
		<div>
			<input name='_method' type='hidden' value='put'>
		</div>

		<div>
			<input name='title' type='text' value='<?php echo $movie->title; ?>' placeholder='Title'>
		</div>

		<div>
			<input name='genre' type='text' value='<?php echo $movie->genre; ?>' placeholder='Genre'>
		</div>

		<div>
			<input name='release_date' type='date' value='<?php echo $movie->release_date; ?>' placeholder='Release Date'>
		</div>

		<div>
			<input name='rating' type='text' value='<?php echo $movie->rating; ?>' placeholder='Rating'>
		</div>

		<div>
			<input name='runtime' type='text' value='<?php echo $movie->runtime; ?>' placeholder='Runtime'>
		</div>

		<div>
			<input name='director' type='text' value='<?php echo $movie->director; ?>' placeholder='Director'>
		</div>

		<div>
			<input name='writer' type='text' value='<?php echo $movie->writer; ?>' placeholder='Writer'>
		</div>

		<div>
			<input name='cast' type='text' value='<?php echo $movie->cast; ?>' placeholder='Cast'>
		</div>

		<div>
			<input name='synopsis' type='text' value='<?php echo $movie->synopsis; ?>' placeholder='Synopsis'>
		</div>

		<br />

		<div>
			<button type='submit'>Save</button>
		</div>
	</form>

	<form action='/movies/<?php echo $movie->id; ?>' method='post'>
		<input name='_method' type='hidden' value='delete'>
		<button type='submit'>Delete Movie</button>
	</form>

</body>
</html>