
@extends('layouts.layout')

@include('layouts.partials.errors', ['errors' => $errors])

@section('content')

{{ Form::open(['route' => ['tasks.update', $task->id], 'method' => 'put']) }}

	{{ Form::hidden('done', 0) }}
	{{ Form::checkbox('done', 1, $task->done) }}

	{{ Form::label('name') }}
	{{ Form::text('name', $task->name) }}

	{{ Form::label('description') }}
	{{ Form::textarea('description', $task->description) }}

	{{ Form::label('estimation') }}
	{{ Form::text('estimation', $task->estimation) }}

	{{ Form::label('resolution') }}
	{{ Form::select('resolution_id', $resolutions) }}

	{{ Form::submit('Update') }}

{{ Form::close() }}

@stop
