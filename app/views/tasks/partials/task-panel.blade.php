<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $title }} [{{ count($tasks) }}]</h3>
	</div>
	<div class="panel-body">
        <table class="data-table table table-striped table-bordered">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Task</th>
        			<th>Comments</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($tasks as $task)
					<tr>
						<td>{{ $task->id }}</td>
						<td>
							@if($task->done && $task->resolution)
							<span class="label label-default">
								{{ $task->resolution->name }}
							</span>&nbsp;
							@endif
							{{ HTML::linkRoute('tasks.show', $task->name, [$task->id]) }}
						</td>
						<td>1</td>
					</tr>
				@endforeach
        	</tbody>
        </table>
	</div>
</div>
