<?php

class Task extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required',
		'estimation' => 'numeric',
		'resolution_id' => 'required|exists:resolutions,id'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'description', 'estimation', 'resolution_id'];

	public function resolution() {
		return $this->belongsTo('Resolution');
	}
}
