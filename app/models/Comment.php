<?php

class Comment extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'comment' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['comment', 'task_id'];

}
