@extends('layout')
@section('content')

<h1>all matches</h1>

<table class="all-matches">
	<thead>
		<th>Host</th>
		<th>Guest</th>
		<th>Date</th>
		<th>Result</th>
	</thead>
	<tbody>
@foreach ($matches as $m)
<tr>
	<td>{{ $m->team1 }}</td>
	<td>{{ $m->team2 }}</td>
	<td>{{ $m->date }}</td>
	<td>{{ $m->score }}</td>
</tr>
@endforeach
	</tbody>
</table>

@stop