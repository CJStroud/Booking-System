<?php
namespace HMCC\Repository\Gallery;

use ImageCollection;
use HMCC\Repository\Repository;
use HMCC\Repository\Gallery\FindBestSlugTrait;
use HMCC\Repository\Gallery\BySlugTrait;

class ImageCollectionRepository extends Repository
{
    use FindBestSlugTrait;
    use BySlugTrait;

    public function __construct(ImageCollection $imageCollection)
    {
        parent::__construct($imageCollection);
    }

    public function store($data)
    {
        if ($data['path'] != '') {
            try {
                $collection = $this->collectionByPath($data['path']);
                $data['collection_id'] = $collection->id;
            } catch (\Exception $e) {
            }
        }
        $data['slug'] = $this->toSlug($data['name']);

        $calculated = $this->findSuitableSlug($data['path'], $data['slug']);

        $data['path'] = $calculated['path'];
        $data['slug'] = $calculated['slug'];

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

    public function collectionByPath($path)
    {
        return $this->model->where('path', '=', $path)->firstOrFail();
    }

    public function allWithPathIncluded($path)
    {
        return $this->model->where('path', 'LIKE', $path . '%')->get();
    }

    public function updateToNewPath($oldPath, $newPath)
    {
        $collections = $this->allWithPathIncluded($oldPath);

        foreach ($collections as $collection) {
            $collection->path = str_replace($oldPath, $newPath, $collection->path);
            $collection->save();
        }
    }
}
