(function (App) {
	App.TasksList = Array;

	App.TasksList.prototype.findByProperty = function(id) {
		return _.findWhere(this, {id:id});
	};

	App.TasksList.prototype.findIndexByProperty = function(id) {
		return this.findIndex(function(element, index, array) {
			return element.id == id;
		});
	};

	App.TasksList.prototype.remove = function(id) {

		return this.splice(this.findIndexByProperty(id), 1)[0];


	};

})(window.App);
