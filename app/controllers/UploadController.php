<?php

use HMCC\Repository\Gallery\UploadRepository;

class UploadController extends BaseController
{
    /**
     * @var UploadRepository
     */
    protected $repository;

    public function __construct(UploadRepository $repository)
    {
        $this->repository = $repository;
    }

    public function inlineImage($imageId)
    {
        $upload = $this->repository->find($imageId);

        $path = $this->uploadPath() . '/' . $upload->location;

        if (file_exists($path)) {
            $image = File::get($path);

            $response = Response::make($image);

            $response->header('Content-Type', $upload->file_type);

            return $response;
        } else {
            App::abort(404);
        }

    }

    private function uploadPath()
    {
        return app_path() . '/storage/uploads';
    }
}
