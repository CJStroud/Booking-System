<?php

class Booking extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bookings';

	protected $fillable = ['user_id', 'event_id', 'class_id', 'transponder', 'skill_level'];
}
