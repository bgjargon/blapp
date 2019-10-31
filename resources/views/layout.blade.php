<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bundesliga App</title>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/css.css') }}" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
	<div class="content">
		<div class="title m-b-md">
			<a href="http://localhost:8000">Bundesliga </a>
		</div>

		<div class="links">
			<a href="http://localhost:8000/next">Next Spieltag</a>
			<a href="http://localhost:8000/all">All matches</a>
			<a href="http://localhost:8000/winloss">Win/Loss</a>
			<a href="http://localhost:8000/search">Search for a player</a>
		</div>
	
	@yield('content')

	</div>
</div>
</body>
</html>
