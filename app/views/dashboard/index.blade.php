
@extends('layouts.layout')

@section('content')


<div class="row" id="dashboard">

	<div id="today-panel" class="col-md-6">
		@include('tasks.partials.task-panel', ['tasks' => $tasksToday, 'title' => 'Completed Today'])
	</div>

	<div id="yesterday-panel" class="col-md-6">
		@include('tasks.partials.task-panel', ['tasks' => $tasksYesterday, 'title' => 'Completed Yesterday'])
	</div>

</div>

<div class="row">
	<div class="col-md-6">
		@include('dashboard.partials.chart-panel', [
			'title' => 'Tasks per Month',
			'canvas_id' => 'tasks-month'
		])
	</div>

	<div class="col-md-6">
		@include('dashboard.partials.chart-panel', [
			'title' => 'Resolution Breakdown',
			'canvas_id' => 'tasks-resolution'
		])
	</div>
</div>

@stop

@section('scripts')
<script src="/js/dashboard.js"></script>
@stop
