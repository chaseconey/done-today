<?php

namespace api;

use Task, Input;

class TasksController extends \BaseController {

	public function index() {
		return Task::all();
	}

	public function toggle($id) {

		$task = Task::findOrFail($id);
		$task->done = (int)Input::get('done');
		$task->save();

		return $task;
	}

}
