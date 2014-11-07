
<div id="comments-quick-create" class="quick-create">

	{{ Form::open(['route' => ['tasks.comments.store', $task->id], 'role' => 'form']) }}

		<div class="form-group">
			{{ Form::text('comment', null, [
					'class' => 'form-control',
					'placeholder' => 'Leave a comment...'
				]) }}
		</div>

		{{ Form::hidden('task_id', $task->id) }}

	{{ Form::close() }}
</div>
