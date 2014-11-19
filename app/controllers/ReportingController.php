<?php

use Carbon\Carbon;

class ReportingController extends \BaseController {

	/**
	 * @var Task
	 */
	private $task;

	/**
	 * @param Task $task
	 */
	public function __construct(Task $task) {
		$this->task = $task;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$query = $this->task->with('comments', 'resolution');

		$tasks = $this->filter($query);

		$tasks = $tasks->paginate(Input::get('limit', 10));

		return View::make('reporting.index', compact('tasks'));

	}

	private function filter($query) {
		$done = Input::get('done');
		$startDate = Input::get('date');
		$period = Input::get('period');

		if (!is_null($done)) {
			$query = $query->done();
		} else {
			$query = $query->notDone();
		}

		if (!is_null($startDate)) {
			if ($period) {
				$startDate = new Carbon($startDate);
				$endDate = $startDate->copy()->addDays($period - 1)->endOfDay();
				$query = $query->whereBetween('completed_at', [$startDate, $endDate]);
			} else {
				$query = $query->where('completed_at', '=', $startDate);
			}
		}

		return $query;
	}

}
