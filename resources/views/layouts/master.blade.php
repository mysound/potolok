<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Натяжные Потолки Армавир от Частного Мастера@yield('title')</title>
	<meta name="description" content="@yield('description')">
	<meta name="keywords" content="@yield('keywords')">
	<link href="/css/app.css" rel="stylesheet">
	@yield('stylesheets')
	{!! NoCaptcha::renderJs() !!}
</head>
<body>

	@include ('layouts.header')

	@yield ('content')

	@include ('layouts.footer')
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/app.js"></script>

</body>
</html>