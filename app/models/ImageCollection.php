<?php

class ImageCollection extends Eloquent {

    protected $table = 'image_collections';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'slug', 'path', 'collection_id'];

    public function parentCollection()
    {
        return $this->hasOne('ImageCollection', 'id', 'collection_id');
    }

    public function images()
    {
        return $this->hasMany('Image', 'collection_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('ImageCollection', 'collection_id', 'id');
    }
}
