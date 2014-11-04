
<div id="tasks-quick-create" class="quick-create">

	{{ Form::open(['route' => 'tasks.store', 'class' => 'form-inline']) }}

		<div class="form-group">
			{{ Form::label('name') }}
			{{ Form::text('name', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
		</div>

		<div class="form-group">
			{{ Form::label('estimation') }}
			{{ Form::text('estimation', null, ['class' => 'form-control']) }}
		</div>

		{{ Form::submit('Add', ['class' => 'quick-create-btn btn btn-primary']) }}

	{{ Form::close() }}
</div>
