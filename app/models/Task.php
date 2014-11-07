<?php

class Task extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required',
		'estimation' => 'numeric',
		'resolution_id' => 'exists:resolutions,id'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'description', 'estimation', 'resolution_id', 'done', 'completed_at'];

	public function getDates() {
		return ['completed_at', 'updated_at', 'created_at'];
	}

	public function resolution() {
		return $this->belongsTo('Resolution');
	}

	public function comments() {
		return $this->hasMany('Comment');
	}

	public function scopeDone($query) {
		return $query->where('done', true);
	}

	public function scopeNotDone($query) {
		return $query->where('done', false);
	}

}
