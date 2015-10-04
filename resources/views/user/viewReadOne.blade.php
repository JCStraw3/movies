<html>
<head>
	<title>Movies</title>
</head>
<body>

	<h1>Hello, <?php echo $user->name; ?></h1>

	<?php if (Session::has('flash_message')): ?>
		<div><?php echo (Session::get('flash_message')); ?></div>
	<?php endif; ?>

	<div>
		<?php echo $user->name; ?>
	</div>

	<div>
		<?php echo $user->email; ?>
	</div>

	<div>
		<?php echo $user->gender; ?>
	</div>

	<div>
		<?php echo $user->birthday; ?>
	</div>

</body>
</html>