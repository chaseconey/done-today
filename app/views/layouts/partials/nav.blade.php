
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Done Today</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li>{{ HTML::link('/', 'Dasboard') }}</li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
        	<li>{{ HTML::linkRoute('tasks.index', 'Tasks') }}</li>
        	<li>{{ HTML::linkRoute('resolutions.index', 'Resolutions') }}</li>
          </ul>
        </li>
        <li>{{ HTML::linkRoute('reporting.index', 'Reporting') }}</li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
