<?php

class BookingFrequency extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'booking_frequencies';

	public $timestamps = false;

	protected $fillable = ['booking_id', 'frequency_id'];

}
