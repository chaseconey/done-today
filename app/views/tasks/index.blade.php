
@extends('layouts.layout')

@section('content')

<div id="tasksContainer" class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="text-center">
			@include('tasks.partials.quick_create')
		</div>

		<h2>{{ count($tasks) }} Tasks</h2>
		<ul id="tasks" class="list-unstyled"></ul>
	</div>
</div>

<script id="tasks-template" type="text/x-handlebars-template">
	@{{#each this}}
		<li data-id="@{{ id }}">

			<input type="checkbox" />

			<small>[@{{id}}]</small>
			<a href="/tasks/@{{id}}/edit">@{{name}}</a>
			- <small>Created on @{{dateFormat created_at format="YYYY-MM-DD"}}</small>
		</li>
	@{{/each}}
</script>

@stop

@section('scripts')
<script src="/js/tasks.js"></script>
@stop
