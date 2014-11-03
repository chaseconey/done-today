
@extends('layouts.layout')

@section('content')

<div class="row">
<div class="col-md-4">
	@include('layouts.partials.errors', ['errors' => $errors])

	{{ Form::open(['route' => 'resolutions.store']) }}

		<div class="form-group">
			{{ Form::label('name') }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}
		</div>

		{{ Form::submit('Add', ['class' => 'quick-create-btn btn btn-primary']) }}

	{{ Form::close() }}
</div>
</div>
@stop
