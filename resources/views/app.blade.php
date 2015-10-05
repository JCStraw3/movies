<!DOCTYPE html>

<html>

<head>
	<title>Movies - @yield('title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>

<body>

	@include('partials.nav')

	@yield('toolbar')

	@yield('content')

	@include('partials.footer')

</body>

</html>