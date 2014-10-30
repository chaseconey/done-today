<?php


class DashboardController extends BaseController {

	public function index() {

		$today = new DateTime('today');
		$yesterday = new DateTime('yesterday');

		$tasksToday = Task::where('created_at', '>=', $today)->get();
		$tasksYesterday = Task::whereBetween('created_at', [$yesterday, $today])->get();

		return View::make('dashboard.index')
			->with('tasksYesterday', $tasksYesterday)
			->with('tasksToday', $tasksToday);
	}

}
