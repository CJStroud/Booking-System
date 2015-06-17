<?php
namespace HMCC\Repository\Gallery;

use Upload;
use HMCC\Repository\Repository;

class UploadRepository extends Repository
{

    public function __construct(Upload $upload)
    {
        parent::__construct($upload);
    }

    /**
     * Generates a random file name.
     * @link http://stackoverflow.com/questions/19083175/generate-random-string-in-php-for-file-name
     * @param Integer $length The length of the file name
     * @return String
     */
    public function generateRandomFileName($length = 15)
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }
}
