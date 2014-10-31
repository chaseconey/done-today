(function ($) {

	$('#container').on('click', 'input[type=checkbox]', function(e) {
		var checked = $(this).is(':checked'),
			task_id = $(this).parent('li').data('id');

		checked = (checked == false) ? 0 : 1;

		toggle(task_id, checked)
	});

	$('.quick-create-btn').on('click', function() {
		var form = $(this).parent('.quick-create'),
			name = form.find('input[name="name"]').val(),
			estimation = form.find('input[name="estimation"]').val();

		create(name, estimation);
	});

	function create(name, estimation) {
		$.ajax({
			type: 'POST',
			url: '/api/tasks/',
			dataType: 'json',
			data: { name: name, estimation: estimation }
		}).done(function(data) {
			console.log("task added: " + data);
		});
	}

	function toggle(task_id, checked) {
		$.ajax({
			type: 'POST',
			url: '/api/tasks/' + task_id + '/toggle',
			dataType: 'json',
			data: { done: checked }
		}).done(function(data) {
			console.log("toggled to: " + data.done);
		});
	}

})(jQuery);
