<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bundesliga App</title>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<style>
html, body { background-color: #fff; color: #636b6f; font-family: 'Nunito', sans-serif; font-weight: 200; margin: 0; }
.flex-center { align-items: center; display: flex; justify-content: center; } 
.position-ref { position: relative; } 
.top-right { position: absolute; right: 10px; top: 18px; }
.links { margin-bottom: 5em; }
.content { text-align: center; }
.title { font-size: 84px; }
.title a { color: #636b6f; text-decoration: none; }
.links > a { color: #636b6f; padding: 0 25px; font-size: 13px; font-weight: 600; letter-spacing: .1rem; text-decoration: none; text-transform: uppercase; }
.m-b-md { margin-bottom: 30px; }

h1 { text-transform: uppercase; }
.next-match-row { padding: 11px; border-bottom: 1px solid black }
.next-match-row h2 { font-weight: normal; }
.next-match-row h2 img { margin: 0 5px; width: 24px; }
</style>
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
