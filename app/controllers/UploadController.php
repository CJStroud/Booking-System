<?php

use HMCC\Repository\Gallery\UploadRepository;

class UploadController extends BaseController {
    
    /**
     * @var UploadRepository
     */
    protected $repository;
    
    public function __construct(UploadRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function inlineImage($id)
    {
        $upload = $this->repository->find($id);
        
        $path = $this->upload_path() . '/' . $upload->location;
        
        if (file_exists($path))
        {
            $name = basename($path);
            
            $image = File::get($path);
            
            $response = Response::make($image);
            
            $response->header('Content-Type', $upload->file_type);
            
            return $response;
        } else{
            App::abort(404);
        }
        
    }
    
    private function upload_path()
    {
        return app_path() . '/storage/uploads';
    }
}
