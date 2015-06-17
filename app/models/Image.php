<?php

class Image extends Eloquent {

    protected $table = 'images';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'slug', 'upload_id', 'collection_id'];

    public function upload()
    {
        return $this->hasOne('Upload', 'id', 'upload_id');
    }

    public function collection()
    {
        return $this->hasOne('ImageCollection', 'id', 'collection_id');
    }
}
