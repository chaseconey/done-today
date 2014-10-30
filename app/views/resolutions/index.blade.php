
@extends('layouts.layout')

@section('content')

<a href="{{ URL::route('resolutions.create') }}">Create</a>

<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Created</th>
			<th>Updated</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($resolutions as $res)
		<tr>
			<td>{{ $res->id }}</td>
			<td>{{{ $res->name }}}</td>
			<td>{{ $res->created_at }}</td>
			<td>{{ $res->updated_at }}</td>
			<td>
				{{ Form::open(['route' => ['resolutions.destroy', $res->id], 'method' => 'delete']) }}
					{{ Form::submit('Delete') }}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop
