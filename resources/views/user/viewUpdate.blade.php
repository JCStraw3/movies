<html>
<head>
	<title>Movies</title>
</head>
<body>

	<h1>Hello, <?php echo $user->name; ?></h1>

	<?php if (Session::has('flash_message')): ?>
		<div><?php echo (Session::get('flash_message')); ?></div>
	<?php endif; ?>

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
			<select name='gender'>
				<option value='female'>Female</option>
				<option value='male'>Male</option>
			</select>
		</div>

		<div>
			<input name='birthday' type='date' value='<?php echo $user->birthday ?>' placeholder='Birthday'>
		</div>

		<br />

		<div>
			<button type='submit'>Save</button>
		</div>
	</form>

</body>
</html>