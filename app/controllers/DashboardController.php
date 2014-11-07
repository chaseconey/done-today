<?php

use Carbon\Carbon;

class DashboardController extends BaseController {

	public function index() {
		$today = new Carbon('today');
		$yesterday = new Carbon('yesterday');

		$tasksToday = Task::where('completed_at', '>=', $today)
			->with('comments', 'resolution')
			->done()
			->get();

		$tasksYesterday = Task::whereBetween('completed_at', [$yesterday->toDateTimeString(), $yesterday->endOfDay()])
			->with('comments', 'resolution')
			->done()
			->get();

		return View::make('dashboard.index')
			->with('tasksYesterday', $tasksYesterday)
			->with('tasksToday', $tasksToday);
	}

}
