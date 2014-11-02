(function ($, _) {

	// Current Tasks
	var tasksList = new App.TasksList,
		currentTasksDiv = '#currentTasks',
		$currentTasks = $(currentTasksDiv),

		// Loading node
		loadingDiv = $('<div/>', {
			class: 'loader',
			text: 'Loading'
		});

	// Compile templates
	var source = $("#tasks-template").html();
	var taskTemplate = Handlebars.compile(source);

	// Load data
	loadCurrentTasks();

	// Register click events
	$('#container').on('click', 'input[type=checkbox]', function(e) {
		var li = $(this).parent('li'),
			task_id = li.data('id'),
			task = _.findWhere(tasksList, {id:task_id});

		task.toggle().done(function() {
			li.remove();
		});
	});

	$('.quick-create-btn').on('click', function() {
		var form = $(this).parent('.quick-create'),
			name = form.find('input[name="name"]'),
			estimation = form.find('input[name="estimation"]');

		var task = new App.Task({name: name.val(), estimation: estimation.val()});

		task.create().done(function(task) {
			name.val('');
			estimation.val('');

			tasksList.push(task);
			updateTemplate(taskTemplate, tasksList, '#currentTasks');
		})

	});

	function updateTemplate(template, data, target) {
		var html = template(data);

		$(target).html(html);
	}

	function loadCurrentTasks() {
		$currentTasks.html(loadingDiv);
		$.getJSON('api/tasks', {done: 0}).done(function(tasks) {
			tasks.map(function(task) {
				tasksList.push(new App.Task(task));
			});

			updateTemplate(taskTemplate, tasksList, currentTasksDiv);
		});
	}

})(jQuery, _);
