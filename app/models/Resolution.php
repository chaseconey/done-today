<?php

class Resolution extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|unique:resolutions'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

}
