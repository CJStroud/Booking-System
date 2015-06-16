<?php
namespace HMCC\Repository\Gallery;

use Image;
use HMCC\Repository\Repository;

class ImageRepository extends Repository {

    public function __construct(Image $image)
    {
        parent::__construct($image);
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

    public function getImagesWithCollections()
    {
        return $this->model->whereNull('collection_id')->get();
    }
}
