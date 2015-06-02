<?php
namespace HMCC\Repository\Gallery;

use Upload;
use HMCC\Repository\Repository;

class UploadRepository extends Repository {
    
    public function __construct(Upload $upload)
    {
        parent::__construct($upload);
    }
    
}
