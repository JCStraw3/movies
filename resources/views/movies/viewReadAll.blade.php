<html>
<head>
	<title>Movies</title>
</head>
<body>

	<h1>Movies</h1>

	<?php foreach ($movies as $movie): ?>

		<article class='movie'>
			<h2><?php echo $movie->title; ?></h2>

			<div>
				<?php echo $movie->genre; ?>
			</div>

			<div>
				<?php echo $movie->release_date; ?>
			</div>

			<div>
				<?php echo $movie->rating; ?>
			</div>

			<div>
				<?php echo $movie->runtime; ?>
			</div>

			<div>
				<?php echo $movie->director; ?>
			</div>

			<div>
				<?php echo $movie->writer; ?>
			</div>

			<div>
				<?php echo $movie->cast; ?>
			</div>

			<div>
				<?php echo $movie->synopsis; ?>
			</div>
		</article>

	<?php endforeach; ?>

</body>
</html>