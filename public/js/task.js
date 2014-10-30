(function ($) {

	$('#container').on('click', 'input[type=checkbox]', function(e) {
		var task = new Task(),
			checked = $(this).is(':checked');

		task.id = $(this).parent('li').data('id');
		task.toggleDone(checked);
	});

	function Task() {
		this.id = null;
		this.name = '';
		this.done = null;
	}

	Task.prototype.toggleDone = function(done) {
		var that = this;
		$.ajax({
			type: 'PUT',
			url: '/api/tasks/' + that.id + '/toggle',
			dataType: 'json',
			data: { done: done }
		}).done(function(data) {
			that.done = data.done;
		});
	};

})(jQuery);
