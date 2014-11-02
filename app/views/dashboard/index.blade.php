
@extends('layouts.layout')

@section('content')
<h1>Dashboard</h1>

@include('tasks.partials.quick_create')

<section id="currentTasksContainer">
	<h2>Current Tasks</h2>
	<ul id="currentTasks"></ul>
</section>

<section id="completedTasksContainer">
	<h2>Completed Tasks</h2>
	<ul id="completedTasks"></ul>
</section>

<script id="tasks-template" type="text/x-handlebars-template">
	@{{#each this}}
		<li data-id="@{{ id }}">

			<input type="checkbox" />

			@{{#if resolution_id }}
			<small>[@{{ resolution_id }}]</small>
			@{{/if}}

			@{{name}}
		</li>
	@{{/each}}
</script>

@stop

@section('scripts')
<script src="/js/dashboard.js"></script>
@stop
