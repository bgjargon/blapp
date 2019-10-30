@extends('layout')
@section('content')

<h1>Next Spieltag</h1>

<table class="all-matches">
	<thead>
		<th>Host</th>
		<th>Guest</th>
		<th>Date</th>
	</thead>
	<tbody>
	@foreach ($matches as $m)
<tr>
	<td>{{ $m->Team1->TeamName }}</td>
	<td>{{ $m->Team2->TeamName }}</td>
	<td>{{ $m->MatchDateTime }}</td>
</tr>
@endforeach
	</tbody>
</table>

@stop