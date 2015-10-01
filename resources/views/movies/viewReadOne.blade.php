<html>
<head>
	<title>Movies</title>
</head>
<body>

	<article class='movie'>
		<h1><?php echo $movie->title; ?></h1>

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

</body>
</html>