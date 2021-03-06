
@extends('layouts.layout')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">

	@include('layouts.partials.errors', ['errors' => $errors])

	{{ Form::open(['route' => ['tasks.update', $task->id], 'method' => 'put', 'role' => 'form']) }}

		<div class="row">
		<div class="col-md-3">
			{{ Form::hidden('done', 0) }}
			<div class="checkbox">
				<label>
					{{ Form::checkbox('done', 1, $task->done) }}
					Completed
				</label>
			</div>
		</div>
		<div class="col-md-9">
			<div class="form-group">
				{{ Form::label('name') }}
				{{ Form::text('name', $task->name, ['class' => 'form-control']) }}
			</div>
		</div>
		</div>

		<div class="form-group">
			{{ Form::label('completed_at') }}
			{{ Form::input('date',
				'completed_at',
				isset($task->completed_at) ? $task->completed_at->format('Y-m-d') : null,
				['class' => 'form-control']
			)}}
		</div>

		<div class="form-group">
			{{ Form::label('description') }}
			{{ Form::textarea('description', $task->description, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('estimation') }}
			{{ Form::text('estimation', $task->estimation, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('resolution_id', 'Resolution') }}
			{{ Form::select('resolution_id', $resolutions, $task->resolution_id, ['class' => 'form-control']) }}
		</div>

		{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

	{{ Form::close() }}

	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		@include('tasks.comments.index', ['comments' => $task->comments])
	</div>
</div>

@stop
