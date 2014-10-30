
@extends('layouts.layout')

@section('content')

@include('layouts.partials.errors', ['errors' => $errors])

{{ Form::open(['route' => 'tasks.store']) }}

	{{ Form::label('name') }}
	{{ Form::text('name') }}

	{{ Form::label('description') }}
	{{ Form::textarea('description') }}

	{{ Form::label('estimation') }}
	{{ Form::text('estimation') }}

	{{ Form::label('resolution') }}
	{{ Form::select('resolution_id', $resolutions) }}

	{{ Form::submit('Add') }}

{{ Form::close() }}

@stop
