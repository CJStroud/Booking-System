<?php
use HMCC\Repository\Gallery\ImageCollectionRepository;
use HMCC\Repository\Gallery\ImageRepository;

class GalleryController extends \BaseController
{
    protected $imgRepository;

    protected $imgCollectionRepo;

    public function __construct(ImageRepository $imgRepository, ImageCollectionRepository $imgCollectionRepo)
    {
        $this->imgRepository = $imgRepository;
        $this->imgCollectionRepo = $imgCollectionRepo;
    }

    public function index()
    {
        $collections = $this->imgCollectionRepo->getAllTopLevelCollections();
        $images = $this->imgRepository->getTopLevelImages();

        $path = '';

        return View::make('gallery.index')
                ->withFolders($collections)
                ->withImages($images)
                ->withPath($path);
    }

    public function folder($folders)
    {
        $collection = $this->imgCollectionRepo->collectionByPath($folders);

        $path = $folders;

        return View::make('gallery.index')
                ->withFolders($collection->children)
                ->withImages($collection->images)
                ->withPath($path);
    }
}
