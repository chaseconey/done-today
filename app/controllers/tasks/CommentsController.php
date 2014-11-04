<?php

namespace tasks;

use Comment, Response, Input, Redirect, Validator;

class CommentsController extends \BaseController {

	/**
	 * @var Comment
	 */
	private $comment;

	public function __construct(Comment $comment) {
		$this->comment = $comment;
	}

	/**
	 * Store a newly created comment in storage.
	 *
	 * @param $task_id
	 *
	 * @return Response
	 */
	public function store($task_id) {
		$validator = Validator::make($data = Input::all(), Comment::$rules);

		if ($validator->fails()) {
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$this->comment->create($data);

		return Redirect::route('tasks.edit', ['tasks' => $task_id]);
	}

	/**
	 * Update the specified comment in storage.
	 *
	 * @param $task_id
	 * @param $comment_id
	 *
	 * @internal param int $id
	 *
	 * @return Response
	 */
	public function update($task_id, $comment_id) {
		$comment = $this->comment->findOrFail($comment_id);

		$validator = Validator::make($data = Input::all(), Comment::$rules);

		if ($validator->fails()) {
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$comment->update($data);

		return Redirect::route('comments.index');
	}

	/**
	 * Remove the specified comment from storage.
	 *
	 * @param $task_id
	 * @param $comment_id
	 *
	 * @internal param int $id
	 *
	 * @return Response
	 */
	public function destroy($task_id, $comment_id) {
		$this->comment->destroy($comment_id);

		return Redirect::route('comments.index');
	}

}
