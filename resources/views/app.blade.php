<!DOCTYPE html>

<html>

<head>
	<title>Movies - @yield('title')</title>
</head>

<body>

	@include('partials.nav')

	@yield('toolbar')

	@yield('content')

	@include('partials.footer')

</body>

</html>