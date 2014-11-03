
<div class="quick-create">

	{{ Form::open(['class' => 'form-inline']) }}

		<div class="form-group">
			{{ Form::label('name') }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('estimation') }}
			{{ Form::text('estimation', null, ['class' => 'form-control']) }}
		</div>

		{{ Form::submit('Add', ['class' => 'quick-create-btn btn btn-primary']) }}

	{{ Form::close() }}
</div>
