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
			<input name='genre' type='text' placeholder='Genre'>
		</div>

		<div>
			<input name='release_date' type='date' placeholder='Release Date'>
		</div>

		<div>
			<input name='rating' type='text' placeholder='Rating'>
		</div>

		<div>
			<input name='runtime' type='text' placeholder='Runtime'>
		</div>

		<div>
			<input name='director' type='text' placeholder='Director'>
		</div>

		<div>
			<input name='writer' type='text' placeholder='Writer'>
		</div>

		<div>
			<input name='cast' type='text' placeholder='Cast'>
		</div>

		<div>
			<input name='synopsis' type='text' placeholder='Synopsis'>
		</div>
		
		<div>
			<select name='genres[]' multiple='multiple'>
				<?php foreach ($genres as $genre): ?>
					<option value='<?php echo $genre->id; ?>'><?php echo $genre->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		
		<br />

		<div>
			<button type='submit'>Create Movie</button>
		</div>
	</form>

</body>
</html>