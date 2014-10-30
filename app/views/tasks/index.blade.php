
@extends('layouts.layout')

@section('content')

@include('tasks.partials.quick_create')

<div id="todo">
	<ul id="items">
		@foreach($tasks as $task)
		<li>
			{{ Form::checkbox('done', $task->done, $task->done) }} [{{ $task->id }}] - {{ HTML::linkRoute('tasks.edit', $task->name, [$task->id]) }}
		</li>
		@endforeach
	</ul>
</div>



@stop
