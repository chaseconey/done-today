(function ($, _) {

	// Current Tasks
	var tasksList = new App.TasksList,
		currentTasksDiv = '#tasks',
		$currentTasks = $(currentTasksDiv),

		resolutions = [],

		// Loading node
		loadingDiv = $('<div/>', {
			class: 'loader',
			text: 'Loading'
		});

	// Compile templates
	var source = $("#tasks-template").html();
	var taskTemplate = Handlebars.compile(source);

	// Load data
	loadResolutions();
	loadCurrentTasks();

	// Register click events
	$('#tasks').on('click', 'input[type=checkbox]', function(e) {
		var li = $(this).parent('li'),
			task_id = li.data('id');

		var task = tasksList.remove(task_id);

		task.toggle().done(function() {
			li.remove();
		});
	});

	$('.quick-create').on('submit', function(e) {

		var form = $(this),
			name = form.find('input[name="name"]'),
			estimation = form.find('input[name="estimation"]'),
			task = new App.Task({name: name.val(), estimation: estimation.val()});


		console.log(name.val(), estimation.val(), task);

		e.preventDefault();

		task.create().done(function(task) {
			name.val('');
			estimation.val('');

			tasksList.push(task);
			updateTemplate(taskTemplate, tasksList, currentTasksDiv);
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

	function loadResolutions() {
		return $.getJSON('api/resolutions').done(function(data) {
			_.each(data, function(element, index, list) {
				resolutions[index] = element.name;
			});
		});
	}

})(jQuery, _);
