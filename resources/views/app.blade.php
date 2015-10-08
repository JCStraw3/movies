<!DOCTYPE html>

<html>

<head>
	<title>Movies - @yield('title')</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' type='text/css' href='/css/app.css'>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

	@include('partials.nav')

	@yield('toolbar')

	@yield('content')

	@include('partials.footer')

</body>

</html>