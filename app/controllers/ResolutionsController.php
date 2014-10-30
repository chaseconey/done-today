<?php

class ResolutionsController extends \BaseController {

	/**
	 * Display a listing of resolutions
	 *
	 * @return Response
	 */
	public function index() {
		$resolutions = Resolution::all();

		return View::make('resolutions.index', compact('resolutions'));
	}

	/**
	 * Show the form for creating a new resolution
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('resolutions.create');
	}

	/**
	 * Store a newly created resolution in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$validator = Validator::make($data = Input::all(), Resolution::$rules);

		if ($validator->fails()) {
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		Resolution::create($data);

		return Redirect::route('resolutions.index');
	}

	/**
	 * Display the specified resolution.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		$resolution = Resolution::findOrFail($id);

		return View::make('resolutions.show', compact('resolution'));
	}

	/**
	 * Show the form for editing the specified resolution.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$resolution = Resolution::find($id);

		return View::make('resolutions.edit', compact('resolution'));
	}

	/**
	 * Update the specified resolution in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update($id) {
		$resolution = Resolution::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Resolution::$rules);

		if ($validator->fails()) {
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$resolution->update($data);

		return Redirect::route('resolutions.index');
	}

	/**
	 * Remove the specified resolution from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id) {
		Resolution::destroy($id);

		return Redirect::route('resolutions.index');
	}

}
