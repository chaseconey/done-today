<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $title }} [{{ count($tasks) }}]</h3>
	</div>
	<div class="panel-body">
		<ul>
        	@foreach($tasks as $task)
        		<li data-id="{{ $task->id }}">

        			@if($task->done && $task->resolution)
        			<small>[{{ $task->resolution->name }}]</small>
        			@endif

        			{{ HTML::linkRoute('tasks.show', $task->name, [$task->id]) }}
        		</li>
        	@endforeach
        </ul>
	</div>
</div>
