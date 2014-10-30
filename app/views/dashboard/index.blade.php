
@extends('layouts.layout')

@section('content')
<h1>Dashboard</h1>

<section>
	<h3>Tasks Completed Today [{{ count($tasksToday) }}]</h3>
	<ul>
		@foreach($tasksToday as $task)
			<li>{{ $task->name }}</li>
		@endforeach
	</ul>
</section>

<section>
	<h3>Tasks Completed Yesterday [{{ count($tasksYesterday) }}]</h3>
	<ul>
		@foreach($tasksYesterday as $task)
			<li>{{ $task->name }}</li>
		@endforeach
	</ul>
</section>
@stop
