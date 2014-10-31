(function ($) {

	$('#container').on('click', 'input[type=checkbox]', function(e) {
		var checked = $(this).is(':checked'),
			task_id = $(this).parent('li').data('id');

		checked = (checked == false) ? 0 : 1;

		$.ajax({
			type: 'POST',
			url: '/api/tasks/' + task_id + '/toggle',
			dataType: 'json',
			data: { done: checked }
		}).done(function(data) {
			console.log("toggled to: " + data.done);
		});
	});

})(jQuery);
