<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $title }} [{{ count($tasks) }}]</h3>
	</div>
	<table class="data-table table table-condensed table-striped table-hover table-responsive">
		<thead>
			<tr>
				<th>#</th>
				<th>Task</th>
				<th>Resolution</th>
				<th>Comments</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tasks as $task)
				<tr>
					<td>{{ $task->id }}</td>
					<td>
						{{ HTML::linkRoute('tasks.show', $task->name, [$task->id]) }}
					</td>
					<td>
						@if(isset($task->resolution->name))
							<span class="label label-success">
								{{ $task->resolution->name }}
							</span>
						@endif
					</td>
					<td class="comments">
						<a href="{{ URL::route('tasks.edit', $task->id) }}#comments">
							<span class="glyphicon glyphicon-comment"></span>
							{{ count($task->comments) }}
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
