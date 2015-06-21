<?php
namespace HMCC\Form\Gallery;

use Input;
use HMCC\Form\Form;
use HMCC\Repository\Gallery\ImageRepository;
use HMCC\Repository\Gallery\UploadRepository;
use HMCC\Repository\Gallery\ImageCollectionRepository;

/**
 * Admin Form for uploading and managing the gallery.
 * @package HMCC\Form\Gallery
 */
class AdminGalleryForm extends Form
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
        UploadRepository $uploadRepostiory
    ) {
        $this->imgCollectionRepo = $imgCollectionRepo;
        $this->imageRepository = $imageRepository;
        $this->uploadRepository = $uploadRepostiory;
    }

    public function uploadImage($input)
    {
        $imageSlug = $this->imageRepository->toSlug($input['name']);

        $image = Input::file('image-upload');
        $imageFileName = $this->uploadRepository->generateRandomFileName();
        $image = $image->move(app_path() . '/storage/uploads', $imageFileName);
        $mimeType = $image->getMimeType();

        $uploadData = [
            'location' => $imageFileName,
            'file_type' => $mimeType,
        ];
        $upload = $this->uploadRepository->store($uploadData);
        $imageData = [
            'name' => $input['name'],
            'description' => $input['description'],
            'slug' => $imageSlug,
            'upload_id' => $upload->id
        ];

        if ($input['path'] != '') {
            $collection = $this->imgCollectionRepo->collectionByPath($input['path']);
            $imageData['collection_id'] = $collection->id;
        }

        $this->imageRepository->store($imageData);
    }
}
