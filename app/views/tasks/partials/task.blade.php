
<ul>
	@foreach($tasks as $task)
		<li @if($task->done) class="task-completed" @endif data-id="{{ $task->id }}">
			{{ Form::checkbox($task->done, 1, $task->done) }}

			@if($task->done)
			<small>[{{ $task->resolution->name }}]</small>
			@endif

			{{ HTML::linkRoute('tasks.show', $task->name, [$task->id]) }}
		</li>
	@endforeach
</ul>
