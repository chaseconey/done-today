
@extends('layouts.layout')

@section('content')

<a href="{{ URL::route('tasks.create') }}">Create</a>

<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Estimation (h)</th>
			<th>Created</th>
			<th>Updated</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tasks as $task)
		<tr>
			<td>{{ $task->id }}</td>
			<td><small>[{{ $task->resolution->name }}]</small> {{{ $task->name }}}</td>
			<td>{{ $task->estimation }}</td>
			<td>{{ $task->created_at }}</td>
			<td>{{ $task->updated_at }}</td>
			<td>
				{{ Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) }}
					{{ Form::submit('Delete') }}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop
