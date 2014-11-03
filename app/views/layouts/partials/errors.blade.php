
@if($errors->count())
<div class="alert alert-danger alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	<strong>There was a validation issue:</strong>

	<ul>
		@foreach($errors->all('<li>:message</li>') as $error)
			{{ $error }}
		@endforeach
	</ul>
</div>

@endif
