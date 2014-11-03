
<div class="quick-create">

	{{ Form::open() }}

		{{ Form::label('name') }}
		{{ Form::text('name') }}

		{{ Form::label('estimation') }}
		{{ Form::text('estimation') }}

		{{ Form::submit('Add', ['class' => 'quick-create-btn']) }}

	{{ Form::close() }}
</div>
