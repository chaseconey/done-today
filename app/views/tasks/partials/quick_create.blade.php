
@include('layouts.partials.errors', ['errors' => $errors])

{{ Form::open(['route' => 'tasks.store']) }}

	{{ Form::label('name') }}
	{{ Form::text('name') }}

	{{ Form::label('estimation') }}
	{{ Form::text('estimation') }}

	{{ Form::hidden('done', false) }}

	{{ Form::submit('Add') }}

{{ Form::close() }}
