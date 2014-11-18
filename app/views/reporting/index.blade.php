
@extends('layouts.layout')

@section('content')

<div class="row" id="reporting">

	<div class="col-md-12">

		<div id="reporting-controls">
			{{ Form::open(['method' => 'GET']) }}

				<div class="row">

					<!--- Done Field --->
					<div class="form-group col-md-3">
						{{ Form::label('done', 'Done:') }}
						{{ Form::select('done', ['No', 'Yes'], Input::get('done'), ['class' => 'form-control']) }}
					</div>

					<!--- Number of Records Field --->
					<div class="form-group col-md-3">
						{{ Form::label('limit', 'Number of Records:') }}
						{{ Form::select('limit', [10 => 10, 25 => 25, 100 => 100], Input::get('limit', 10), ['class' => 'form-control']) }}
					</div>

					<!--- Completed At Field --->
					<div class="form-group col-md-3">
					    {{ Form::label('date', 'Completed At:') }}
					    {{ Form::input('date', 'date', Input::get('date'), ['class' => 'form-control']) }}
					</div>

				</div>

				<!--- Filter Field --->
				<div class="form-group">
				    {{ Form::submit('Filter', ['class' => 'btn btn-primary']) }}
				</div>

			{{ Form::close() }}
		</div>
		<hr/>
		{{ $tasks->appends(Input::all())->links() }}
		<table class="table table-condensed table-striped table-hover table-responsive">
			<thead>
				<tr>
					<th>#</th>
					<th>Task</th>
					<th>Time</th>
					<th>Completed At</th>
					<th>Resolution</th>
					<th>Comments</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tasks as $task)

				<tr>
					<td>{{ $task->id }}</td>
					<td>{{{ $task->name }}}</td>
					<td>{{ $task->estimation }}</td>
					<td>{{ $task->completed_at->format('Y-m-d') }} ({{ $task->completed_at->diffForHumans() }})</td>
					<td>{{ $task->resolution->name }}</td>
					<td>{{ count($task->comments) }}</td>
				</tr>

				@endforeach
			</tbody>
		</table>
		{{ $tasks->links() }}
	</div>
</div>

@stop

@section('scripts')
<script>
	(function(){

		// Before form submits, disable any fields that are empty
		$('#reporting-controls form').submit(function(e) {
			$(this).find('*').filter(':input').each(function() {
				if($(this).val()=="") {
					$(this).attr('disabled', 'disabled');
				}
			})
		});
	})();
</script>
@stop
