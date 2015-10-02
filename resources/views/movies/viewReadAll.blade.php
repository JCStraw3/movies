<html>
<head>
	<title>Movies</title>
</head>
<body>

	<h1>Movies</h1>

	<?php if (Session::has('flash_message')): ?>
		<div><?php echo (Session::get('flash_message')); ?></div>
	<?php endif; ?>

	<?php foreach ($movies as $movie): ?>

		<article class='movie'>
			<h2>
				<a href='/movies/<?php echo $movie->id; ?>'><?php echo $movie->title; ?></a>
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
					<?php echo $rating->name; ?>,
				<?php endforeach; ?>
			</div>

			<div>
				<?php echo $movie->runtime; ?>
			</div>

			<div>
				<?php echo $movie->synopsis; ?>
			</div>
			
			<br />

			<form action='/movies/<?php echo $movie->id; ?>' method='post'>
				<input name='_method' type='hidden' value='delete'>
				<button type='submit'>Delete Movie</button>
			</form>
		</article>

	<?php endforeach; ?>

</body>
</html>