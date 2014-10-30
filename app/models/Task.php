<?php

class Task extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required',
		'estimation' => 'numeric',
		'resolution_id' => 'exists:resolutions,id'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'description', 'estimation', 'resolution_id', 'done'];

	public function resolution() {
		return $this->belongsTo('Resolution');
	}

	public function scopeDone($query) {
		return $query->where('done', true);
	}

	public function scopeNotDone($query) {
		return $query->where('done', false);
	}

}
