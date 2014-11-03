<?php

namespace api;

use Carbon\Carbon;
use Resolution, DB, Response;

class ResolutionsController extends \BaseController {

	/**
	 * @var Resolution
	 */
	private $resolution;

	public function __construct(Resolution $resolution) {
		$this->resolution = $resolution;
	}

	/**
	 * Display a listing of resolutions
	 *
	 * @return Response
	 */
	public function index() {
		$resolutions = $this->resolution->remember(180)->get();

		return $resolutions;
	}

}
