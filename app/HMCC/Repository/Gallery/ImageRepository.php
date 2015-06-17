<?php
namespace HMCC\Repository\Gallery;

use Image;
use HMCC\Repository\Repository;
use HMCC\Repository\Gallery\FindBestSlugTrait;
use HMCC\Repository\Gallery\BySlugTrait;

class ImageRepository extends Repository
{
    use FindBestSlugTrait;
    use BySlugTrait;

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

    public function getTopLevelImages()
    {
        return $this->model->whereNull('collection_id')->get();
    }
}
