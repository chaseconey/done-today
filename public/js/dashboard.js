(function () {

	var labels = [],
		chartData = [];

	// Tasks by Month Chart
	$.getJSON('api/tasks/report').done(function(data) {
		points = _.pluck(data, 'cnt');

		chartData = constructSimpleData(points, 'Resolution Breakdown');

		// Get context with jQuery - using jQuery's .get() method.
		var ctx = $('#tasks-month').get(0).getContext("2d");
		// This will get the first returned node in the jQuery collection.
		var myBarChart = new Chart(ctx).Bar(chartData);
	});

	// Tasks by Resolution Chart
	$.getJSON('api/tasks/report', {type: 'per-resolution'}).done(function(data) {
		chartData = constructSimplePieData(data);

		// Get context with jQuery - using jQuery's .get() method.
		var ctx = $('#tasks-resolution').get(0).getContext("2d");
		// This will get the first returned node in the jQuery collection.
		var myBarChart = new Chart(ctx).Doughnut(chartData);
	});

	function constructSimpleData(points, label, chartDiv) {
		return {
			labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			datasets: [
				{
					label: label,
					fillColor: "rgba(220,220,220,0.5)",
					strokeColor: "rgba(220,220,220,0.8)",
					highlightFill: "rgba(220,220,220,0.75)",
					highlightStroke: "rgba(220,220,220,1)",
					data: points
				}
			]
		};
	}

	function constructSimplePieData(data) {
		var pie = [];
		_.each(data, function(element, index, list) {
			pie.push({
				value: parseInt(element.cnt),
				color: '#'+Math.floor(Math.random()*16777215).toString(16),
				highlight: '#'+Math.floor(Math.random()*16777215).toString(16),
				label: element.resolution_id
			});
		});

		return pie;
	}

})();
