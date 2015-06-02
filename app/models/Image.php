<?php

class Image extends Eloquent {
    
    protected $table = 'images';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'upload_id', 'collection_id'];
    
    public function upload()
    {
        return $this->hasOne('UploadtT', 'id', 'upload_id');
    }
    
    public function collection()
    {
        return $this->hasOne('ImageCollection', 'id', 'collection_id');
    }
    
}
