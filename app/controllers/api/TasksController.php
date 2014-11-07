<?php

namespace api;

use Carbon\Carbon;
use Task, Input, Response, Validator, DB;

class TasksController extends \BaseController {

	/**
	 * @var Task
	 */
	private $task;

	public function __construct(Task $task) {
		$this->task = $task;
	}

	public function index() {
		$done = Input::get('done');
		$startDate = Input::get('start_date');
		$endDate = Input::get('end_date');

		$task = $this->task;

		if (!is_null($done)) {
			$task = $task->whereDone($done);
		}
		if ($startDate) {
			if ($endDate) {
				$task = $task->whereBetween('updated_at', [$startDate, $endDate]);
			} else {
				$task = $task->where('updated_at', '>=', $startDate);
			}
		}

		return $task->get();
	}

	public function store() {

		$validator = Validator::make($data = Input::all(), Task::$rules);

		if ($validator->fails()) {
			return Response::json(['errors' => $validator->errors()], 422);
		}

		return $this->task->create($data);

	}

	public function toggle($id) {

		$task = $this->task->findOrFail($id);
		$task->done = ($task->done == 0) ? 1 : 0;
		$task->save();

		return $task;
	}

	public function report() {

		$type = Input::get('type', 'per-month');
		$tasks = [];

		switch($type) {
			case 'per-month':
				$tasks = $this->perMonth();
				break;
			case 'per-resolution':
				$tasks = $this->perResolution();
				break;
			default:
				return Response::json(['errors' => ['Incorrect type given']], 422);
				break;
		}

		return $tasks;
	}

	private function perMonth() {
		$now = Carbon::now();

		$tasks = $this->task
			->select(DB::raw('MONTH(updated_at) as month, count(1) as cnt'))
			->where('completed_at', '>=', $now->firstOfYear())
			->done()
			->groupBy(DB::raw('MONTH(updated_at)'))
			->orderBy(DB::raw('MONTH(updated_at)'))
			->get();

		return $tasks;
	}

	private function perResolution() {
		$now = Carbon::now();

		$tasks = $this->task
			->with('resolution')
			->select(DB::raw('resolution_id, count(1) as cnt'))
			->done()
			->where('completed_at', '>=', $now->firstOfYear())
			->groupBy('resolution_id')
			->get();

		return $tasks;
	}

}
