
@extends('layouts.layout')

@section('content')
<h1>Dashboard</h1>

@include('tasks.partials.quick_create')

<section id="current">
	<h3>Current Tasks</h3>
	@include('tasks.partials.task', ['tasks' => $tasks])
</section>

<section>
	<h3>Tasks Completed Today [{{ count($completedToday) }}]</h3>
	@include('tasks.partials.task', ['tasks' => $completedToday])
</section>

<section>
	<h3>Tasks Completed Yesterday [{{ count($completedYesterday) }}]</h3>
	@include('tasks.partials.task', ['tasks' => $completedYesterday])
</section>

@stop
