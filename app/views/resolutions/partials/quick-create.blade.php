
<div class="quick-create">
	@include('layouts.partials.errors', ['errors' => $errors])

	{{ Form::open(['route' => 'resolutions.store', 'class' => 'form-inline']) }}

		<div class="form-group">
			{{ Form::text('name', null, [
					'class' => 'form-control',
					'placeholder' => 'Resolution',
					'autofocus' => 'autofocus'
				]) }}
		</div>

		{{ Form::submit('Add', ['class' => 'quick-create-btn btn btn-primary']) }}

	{{ Form::close() }}
</div>
