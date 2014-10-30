<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Done Today</title>
<link rel="stylesheet" href="/css/style.css"/>
</head>
<body>

	@include('layouts.partials.nav')

	<div id="container">
		@yield('content')
	</div>

<script src="/lib/js/jquery/jquery.js"></script>
<script src="/js/task.js"></script>
@yield('script')
</body>
</html>
