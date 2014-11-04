<?php

class DashboardController extends BaseController {

	public function index() {
		$today = new DateTime('today');
		$yesterday = new DateTime('yesterday');

		$tasksToday = Task::where('updated_at', '>=', $today)
			->with('comments', 'resolution')
			->done()
			->get();

		$tasksYesterday = Task::whereBetween('updated_at', [$yesterday, $today])
			->with('comments', 'resolution')
			->done()
			->get();

		return View::make('dashboard.index')
			->with('tasksYesterday', $tasksYesterday)
			->with('tasksToday', $tasksToday);
	}

}
