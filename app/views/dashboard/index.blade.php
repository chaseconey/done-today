
@extends('layouts.layout')

@section('content')
<h1>Dashboard</h1>

<section>
	<h3>Tasks Completed Today [{{ count($tasksToday) }}]</h3>
	@include('tasks.partials.task', ['tasks' => $tasksToday])
</section>

<section>
	<h3>Tasks Completed Yesterday [{{ count($tasksYesterday) }}]</h3>
	@include('tasks.partials.task', ['tasks' => $tasksYesterday])
</section>

@stop
