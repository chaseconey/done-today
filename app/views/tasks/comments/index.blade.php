
<hr/>
<div id="comments">
<h4>{{  count($comments) }} Comments</h4>

@include('tasks.comments.partials.quick-create')

<ul class="media-list">
	@foreach($comments as $comment)
		<li class="media">
			<a class="media-left" href="#">
				<img src="http://placehold.it/50x50">
			</a>
			<div class="media-body">
				<h4 class="media-heading">{{ $comment->created_at->diffForHumans() }}</h4>
				{{ $comment->comment }}
			</div>
		</li>
	@endforeach
</ul>
</div>
