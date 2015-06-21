<?php

use HMCC\Repository\Gallery\ImageCollectionRepository;
use HMCC\Repository\Gallery\ImageRepository;
use HMCC\Repository\Gallery\UploadRepository;
use HMCC\Form\Gallery\AdminGalleryForm;

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

    /**
     * @var AdminGalleryForm
     */
    protected $galleryForm;

    public function __construct(
        ImageCollectionRepository $imgCollectionRepo,
        ImageRepository $imageRepository,
        UploadRepository $uploadRepository,
        AdminGalleryForm $galleryForm
    ) {
        $this->imgCollectionRepo = $imgCollectionRepo;
        $this->imageRepository = $imageRepository;
        $this->uploadRepository = $uploadRepository;
        $this->galleryForm = $galleryForm;
    }

    public function index()
    {
        $collections = $this->imgCollectionRepo->getAllTopLevelCollections();
        $images = $this->imageRepository->getTopLevelImages();

        $active = 'gallery';
        $path = '';

        return View::make('admin.gallery.index')
                ->withActive($active)
                ->withFolders($collections)
                ->withImages($images)
                ->withPath($path);
    }

    public function newFolder()
    {
        $this->imgCollectionRepo->store(Input::all());

        return Redirect::back();
    }

    public function folder($folders)
    {
        $collection = $this->imgCollectionRepo->collectionByPath($folders);

        $active = 'gallery';
        $path = $folders;

        return View::make('admin.gallery.index')
                ->withActive($active)
                ->withFolders($collection->children)
                ->withImages($collection->images)
                ->withPath($path);

    }

    public function uploadImage()
    {
        $this->galleryForm->uploadImage(Input::all());
        $path = Input::get('path');

        return Redirect::route('admin.gallery.folder', ['folders' => $path]);
    }

    public function moveImage()
    {
        $newLocation = Input::get('newLocation');
        $imageId = Input::get('imageId');

        $image = $this->imageRepository->find($imageId);
        $match = 'admin/gallery/';
        $matchStartPosition = strpos($newLocation, $match);
        $path = substr($newLocation, $matchStartPosition + strlen($match));
        try {
            $collection = $this->imgCollectionRepo->collectionByPath($path);
            $image->collection_id = $collection->id;
        } catch (\Exception $e) {
            $image->collection_id = null;
        }
        $image->save();
        return Response::make(['success' => true, 'path' => $path]);
    }

    public function moveFolder()
    {
        $newLocation = Input::get('newLocation');
        $folderId = Input::get('folderId');
        $folder = $this->imgCollectionRepo->find($folderId);

        $match = 'admin/gallery/';
        $matchStartPosition = strpos($newLocation, $match);
        if ($matchStartPosition == false) {
            $path = '';
        } else {
            $matchEndPosition = $matchStartPosition + strlen($match);
            $path = substr($newLocation, $matchEndPosition);
            if ($path == false) {
                $path = '';
            }
        }
        $newCollectionId = null;

        try {
            $newFolder = $this->imgCollectionRepo->collectionByPath($path);
            $newCollectionId = $newFolder->id;
        } catch (\Exception $e) {

        }

        if ($path == '') {
            $newPath = $folder->slug;
        } else {
            $newPath = $path . '/' . $folder->slug;
        }

        $this->imgCollectionRepo->updateToNewPath($folder->path, $newPath);

        $folder->collection_id = $newCollectionId;
        $folder->save();
        return Response::make(['success' => true]);
    }

    public function delete()
    {
        $itemId = Input::get('id');
        $type = Input::get('type');

        switch ($type) {
            case 'image':
                $this->imageRepository->delete($itemId);
                break;

            case 'folder':
                $collection = $this->imgCollectionRepo->find($itemId);
                $this->imgCollectionRepo->allWithPathIncludeQuery($collection->path)->delete();
                break;
        }

    }
}
