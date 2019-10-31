@extends('layout')
@section('content')

<h1>Next Spieltag</h1>

<table class="table">
	<thead class="thead-light">
		<th>Host</th>
		<th>Guest</th>
		<th>Date</th>
	</thead>
	<tbody>
	@foreach ($matches as $m)
<tr>
	<td>{{ $m->Team1->TeamName }}</td>
	<td>{{ $m->Team2->TeamName }}</td>
	<td>{{ $m->mdt }}</td>
</tr>
@endforeach
	</tbody>
</table>

@stop