@extends('layout')
@section('content')

<h1>all matches</h1>

<table class="table">
	<thead class="thead-light">
		<th>Host</th>
		<th>Guest</th>
		<th>Result</th>
		<th>Date</th>
	</thead>
	<tbody>
@foreach ($matches as $m)
<tr>
	<td>{{ $m->team1 }}</td>
	<td>{{ $m->team2 }}</td>
	<td>{{ $m->score }}</td>
	<td>{{ $m->date }}</td>
</tr>
@endforeach
	</tbody>
</table>

@stop