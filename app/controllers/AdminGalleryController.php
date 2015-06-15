<?php

use HMCC\Repository\Gallery\ImageCollectionRepository;
use HMCC\Repository\Gallery\ImageRepository;
use HMCC\Repository\Gallery\UploadRepository;

class AdminGalleryController extends BaseController
{
    /**
     * @var ImageCollectionRepository
     */
    protected $imgCollectionRepo;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * @var UploadRepository
     */
    protected $uploadRepository;

    public function __construct(
        ImageCollectionRepository $imgCollectionRepo,
        ImageRepository $imageRepository,
        UploadRepository $uploadRepository
    ) {
        $this->imageCollectionRepository = $imgCollectionRepo;
        $this->imageRepository = $imageRepository;
        $this->uploadRepository = $uploadRepository;

    }

    public function index()
    {
        $collections = $this->imageCollectionRepository->getAllTopLevelCollections();
        $images = $this->imageRepository->getImagesWithCollections();

        $active = 'gallery';

        return View::make('admin.gallery.index')
                ->withActive($active)
                ->withFolders($collections)
                ->withImages($images);
    }

    public function newFolder()
    {
        $this->imageCollectionRepository->store(Input::all());

        return Redirect::back();
    }
}
