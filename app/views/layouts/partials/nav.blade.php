
<nav>
	<ul>
		<li>{{ HTML::link('/', 'Dasboard') }}</li>
		<li><a href="#">Manage</a></li>
		<ul>
			<li>{{ HTML::linkRoute('tasks.index', 'Tasks') }}</li>
			<li>{{ HTML::linkRoute('resolutions.index', 'Resolutions') }}</li>
		</ul>
	</ul>
</nav>
