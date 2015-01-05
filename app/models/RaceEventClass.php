<?php

class RaceEventClass extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'event_classes';

    public $timestamps = false;

    protected $fillable = array('class_id', 'event_id', 'limit', 'locked');

}
