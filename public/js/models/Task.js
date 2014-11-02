(function (App, $) {
	App.Task = function(data) {
		this.id = data.id || null;
		this.name = data.name;
		this.done = (data.done === 'true') || false;
		this.description = data.description || '';
		this.estimation = data.estimation || null;
		this.resolution_id = data.resolution_id || null;
		this.created_at = data.created_at || null;
		this.updated_at = data.updated_at || null;
	};

	App.Task.prototype.create = function() {
		var self = this;

		return $.ajax({
			type: 'POST',
			url: '/api/tasks/',
			dataType: 'json',
			data: {
				'name': self.name,
				'estimation': self.estimation,
				'done': self.done
			}
		}).then(function(data) {
			self = new App.Task(data);
			return self;
		});
	};

	App.Task.prototype.toggle = function () {
		var self = this;

		return $.post('/api/tasks/' + this.id + '/toggle')
			.then(function(data) {
				self = new App.Task(data);
				return self;
			});
	}

})(window.App, $);
