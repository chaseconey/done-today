
@extends('layouts.layout')

@section('content')
<h1>Tasks</h1>

@include('tasks.partials.quick_create')

<section id="tasksContainer">
	<h2>Current Tasks</h2>
	<ul id="tasks"></ul>
</section>

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
