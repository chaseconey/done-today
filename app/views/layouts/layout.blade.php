<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Done Today</title>
<link rel="stylesheet" href="/css/style.css"/>
<link rel="stylesheet" href="/css/loader.css"/>
</head>
<body>

	@include('layouts.partials.nav')

	<div id="container">
		@yield('content')
	</div>

<script src="/lib/js/jquery/jquery.js"></script>
<script src="/lib/js/underscore/underscore.js"></script>
<script src="/lib/js/handlebars/handlebars.js"></script>
<script src="/lib/js/momentjs/moment.js"></script>
<script src="/js/helpers/handlebars-date.js"></script>
<script src="/js/app.js"></script>
<script src="/js/models/Tasks.js"></script>
<script src="/js/models/Task.js"></script>
@yield('scripts')

</body>
</html>
