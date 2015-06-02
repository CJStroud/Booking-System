<?php

class ImageCollection extends Eloquent {
    
    protected $table = 'image_collections';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'slug', 'collection_id'];
    
    public function parentCollection()
    {
        return $this->hasOne('ImageCollection', 'id', 'collection_id');
    }
    
    public function images()
    {
        return $this->hasMany('Image');
    }
    
}
