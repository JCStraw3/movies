<html>
<head>
	<title>Movies</title>
</head>
<body>

	<h1>Movies</h1>

	<?php if (Session::has('flash_message')): ?>
		<div><?php echo (Session::get('flash_message')); ?></div>
	<?php endif; ?>

	<article class='movie'>
		<h2>
			<?php echo $movie->title; ?>
		</h2>

		<div>
			<?php foreach ($movie->genres as $genre): ?>
				<?php echo $genre->name; ?>,
			<?php endforeach; ?>
		</div>

		<div>
			<?php echo $movie->release_date; ?>
		</div>

		<div>
			<?php foreach ($movie->ratings as $rating): ?>
				<?php echo $rating->name; ?>
			<?php endforeach; ?>
		</div>

		<div>
			<?php echo $movie->runtime; ?>
		</div>

		<div>
			<?php foreach ($movie->directors as $director): ?>
				<?php echo $director->name; ?>,
			<?php endforeach; ?>
		</div>

		<div>
			<?php foreach ($movie->writers as $writer): ?>
				<?php echo $writer->name; ?>,
			<?php endforeach; ?>
		</div>

		<div>
			<?php foreach ($movie->casts as $cast): ?>
				<?php echo $cast->name; ?>,
			<?php endforeach; ?>
		</div>

		<div>
			<?php echo $movie->synopsis; ?>
		</div>
		
		<br />

		<button><a href='/movies/<?php echo $movie->id; ?>/edit'>Edit Movie</a></button>

		<br />

		<br />

		<form action='/movies/<?php echo $movie->id; ?>' method='post'>
			<input name='_method' type='hidden' value='delete'>
			<button type='submit'>Delete Movie</button>
		</form>
	</article>

</body>
</html>