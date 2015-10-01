<html>
<head>
	<title>Movies</title>
</head>
<body>

	<h1>Hello, <?php echo $user->name; ?></h1>

	<form action='/user/<?php echo $user->id; ?>' method='post'>
		<div>
			<input name='_method' type='hidden' value='put'>
		</div>

		<div>
			<input name='name' type='text' value='<?php echo $user->name ?>' placeholder='Name'>
		</div>

		<div>
			<input name='email' type='email' value='<?php echo $user->email ?>' placeholder='Email'>
		</div>

		<div>
			<button type='submit'>Save</button>
		</div>
	</form>

</body>
</html>