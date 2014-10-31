<?php

namespace api;

use Task, Input, Response, Validator;

class TasksController extends \BaseController {

	public function index() {
		return Task::all();
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
		$task->done = (int)Input::get('done');
		$task->save();

		return $task;
	}

}
