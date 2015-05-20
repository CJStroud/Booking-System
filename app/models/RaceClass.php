<?php

class RaceClass extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'classes';

	public $timestamps = false;

        protected $fillable = array('name', 'active');

}
