@extends('layout')
@section('content')

<h1>Next Spieltag</h1>

@foreach ($matches as $m)
<div class="next-match-row">
	<h2><img src="{{ $m->Team1->TeamIconUrl }}" />{{ $m->Team1->TeamName }} &ndash; {{ $m->Team2->TeamName }}<img src="{{ $m->Team2->TeamIconUrl }}" /></h2>
	<h3>Play time: <span style="font-weight:normal">{{ $m->MatchDateTime }}</span></h3>
</div>
@endforeach

@stop