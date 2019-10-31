@extends('layout')
@section('content')

<h1>search for a player</h1>

<form action="{{url('search')}}" type="get">
  <div class="form-group">
    <label for="playername">Player name</label>
    <input type="search" class="form-control" id="playername" name="playername" placeholder="Enter player name">
  </div>
  <input type="submit" class="btn btn-primary" value="Submit" />
</form>

@if ($res)
<table class="table" style="margin-top: 3rem">
<thead class="thead-light">
	<tr>
		<th>Player name</th>
		<th>Goals</th>
	</tr>
</thead>
<tbody>
@if (count($res) === 0)
	<tr>
		<td colspan="2">No records found</td>
	</tr>
@else
@foreach ($res as $row)
	<tr>
		<td>{{ $row->name }}</td>
		<td>{{ $row->goalcount }}</td>
	</tr>
@endforeach
@endif
</tbody>
</table>
@else
    
@endif

@stop
