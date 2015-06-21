<?php

class Upload extends Eloquent {

    protected $table = 'uploads';
    public $timestamps = true;
    protected $fillable = ['location', 'file_type'];

}
