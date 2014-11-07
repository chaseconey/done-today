<?php

class TasksController extends \BaseController {

	/**
	 * Display a listing of tasks
	 *
	 * @return Response
	 */
	public function index() {
		$tasks = Task::with('resolution')
			->whereDone(false)
			->get();

		return View::make('tasks.index', compact('tasks'));
	}

	/**
	 * Show the form for creating a new task
	 *
	 * @return Response
	 */
	public function create() {
		$resolutions = Resolution::lists('name', 'id');

		return View::make('tasks.create', compact('resolutions'));
	}

	/**
	 * Store a newly created task in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$validator = Validator::make($data = Input::all(), Task::$rules);

		if ($validator->fails()) {
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		Task::create($data);

		return Redirect::route('tasks.index');
	}

	/**
	 * Display the specified task.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		$task = Task::findOrFail($id);

		return View::make('tasks.show', compact('task'));
	}

	/**
	 * Show the form for editing the specified task.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$task = Task::with('comments')->findOrFail($id);
		$resolutions = Resolution::lists('name', 'id');
		$resolutions[null] = '';

		return View::make('tasks.edit')
			->with('task', $task)
			->with('resolutions', $resolutions);
	}

	/**
	 * Update the specified task in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update($id) {

		$task = Task::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Task::$rules);

		if ($validator->fails()) {
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		// If no date completed set, use today as completed date
		if ($data['done'] === '1' && $data['completed_at'] === '') {
			$data['completed_at'] = \Carbon\Carbon::now()->format('Y-m-d');
		}

		$task->update($data);

		return Redirect::route('tasks.index');
	}

	/**
	 * Remove the specified task from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id) {
		Task::destroy($id);

		return Redirect::route('tasks.index');
	}

}
