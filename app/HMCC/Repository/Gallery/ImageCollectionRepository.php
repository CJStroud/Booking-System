<?php
namespace HMCC\Repository\Gallery;

use ImageCollection;
use HMCC\Repository\Repository;

class ImageCollectionRepository extends Repository {

    public function __construct(ImageCollection $imageCollection)
    {
        parent::__construct($imageCollection);
    }

    public function store($data)
    {
        $data['slug'] = $this->toSlug($data['name']);

        parent::store($data);
    }

    public function toSlug($string)
    {
        return rtrim(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string))), '-');
    }

    public function getAllTopLevelCollections()
    {
        return $this->model->whereNull('collection_id')->get();
    }
}
