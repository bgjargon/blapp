@extends('layout')
@section('content')

<h1>Win/Loss Ratio</h1>

<table class="table">
	<thead class="thead-light">
		<th>Team</th>
		<th>Ratio</th>
	</thead>
	<tbody>
@foreach ($matches as $m)
<tr>
	<td>{{ $m->name }}</td>
	<td>{{ $m->wins }}:{{ $m->losses }}</td>
</tr>
@endforeach
	</tbody>
</table>

@stop