
<div class="quick-create">
	@include('layouts.partials.errors', ['errors' => $errors])

	{{ Form::label('name') }}
	{{ Form::text('name') }}

	{{ Form::label('estimation') }}
	{{ Form::text('estimation') }}

	{{ Form::submit('Add', ['class' => 'quick-create-btn']) }}
</div>
