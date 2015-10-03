<html>
<head>
	<title>Movies</title>
</head>
<body>

	<form action='/movies' method='post'>
		<div>
			<input name='title' type='text' placeholder='Title'>
		</div>

		<div>
			<select name='genres[]' multiple='multiple'>
				<?php foreach ($genres as $genre): ?>
					<option value='<?php echo $genre->id; ?>'><?php echo $genre->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div>
			<input name='release_date' type='date' placeholder='Release Date'>
		</div>

		<div>
			<select name='ratings'>
				<?php foreach ($ratings as $rating): ?>
					<option value='<?php echo $rating->id; ?>'><?php echo $rating->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div>
			<input name='runtime' type='text' placeholder='Runtime'>
		</div>

		<div>
			<select name='directors[]' multiple='multiple'>
				<?php foreach ($directors as $director): ?>
					<option value='<?php echo $director->id; ?>'><?php echo $director->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div>
			<input name='synopsis' type='text' placeholder='Synopsis'>
		</div>
		
		<br />

		<div>
			<button type='submit'>Create Movie</button>
		</div>
	</form>

</body>
</html>