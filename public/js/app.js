(function (window, $) {
	window.App = {};

	// Initialize datatables
	$('.data-table').dataTable({
		stateSave: true,
		"lengthChange": false,
		"searching": false
	});

})(window, $);
