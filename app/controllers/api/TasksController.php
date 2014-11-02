<?php

namespace api;

use Task, Input, Response, Validator;

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

		return Task::create($data);

	}

	public function toggle($id) {

		$task = Task::findOrFail($id);
		$task->done = ($task->done == 0) ? 1 : 0;
		$task->save();

		return $task;
	}

}
