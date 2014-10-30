
@extends('layouts.layout')

@section('content')

@include('layouts.partials.errors', ['errors' => $errors])

{{ Form::open(['route' => 'resolutions.store']) }}

	{{ Form::label('name') }}
	{{ Form::text('name') }}

	{{ Form::submit('Add') }}

{{ Form::close() }}

@stop
