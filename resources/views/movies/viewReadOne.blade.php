<html>
<head>
	<title>Movies</title>
</head>
<body>

	<h1><?php echo $movie->title; ?></h1>

	<?php if (Session::has('flash_message')): ?>
		<div><?php echo (Session::get('flash_message')); ?></div>
	<?php endif; ?>

	<form action='/movies/<?php echo $movie->id; ?>' method='post'>
		<div>
			<input name='_method' type='hidden' value='put'>
		</div>

		<div>
			<input name='title' type='text' value='<?php echo $movie->title; ?>' placeholder='Title'>
		</div>

		<div>
			<select name='genres[]' multiple='multiple'>
				<?php foreach ($genres as $genre): ?>
					<option value='<?php echo $genre->id; ?>'><?php echo $genre->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div>
			<input name='release_date' type='date' value='<?php echo $movie->release_date; ?>' placeholder='Release Date'>
		</div>

		<div>
			<select name='ratings[]'>
				<?php foreach ($ratings as $rating): ?>
					<option value='<?php echo $rating->id; ?>'><?php echo $rating->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div>
			<input name='runtime' type='text' value='<?php echo $movie->runtime; ?>' placeholder='Runtime'>
		</div>

		<div>
			<select name='directors[]' multiple='multiple'>
				<?php foreach ($directors as $director): ?>
					<option value='<?php echo $director->id; ?>'><?php echo $director->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div>
			<select name='writers[]' multiple='multiple'>
				<?php foreach ($writers as $writer): ?>
					<option value='<?php echo $writer->id; ?>'><?php echo $writer->name; ?></option>
				<?php endforeach; ?>
			</select>
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