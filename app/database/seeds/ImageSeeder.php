<?php
namespace database\seeds;

use HMCC\Repository\User\UserRepository;

class ImageSeeder extends Seeder
{

    protected $imageRepository;
    protected $imgCollectionRepo;

    public function __construct(
        ImageRepository $imageRepository,
        ImageCollectionRepository $imgCollectionRepo
    ) {
        $this->imageRepository = $imageRepository;
        $this->imgCollectionRepo = $imgCollectionRepo;
    }

    public function run()
    {
        $folder = [
            'name' => 'Test',
        ];
        $this->imgCollectionRepo->store($folder);

        $folder = [
            'name' => 'Test2'
        ];
        $this->imgCollectionRepo->store($folder);

        $image = [
            'name' => 'Test Image',
            'description' => 'This is a description',
            'upload_id' =>
        ];
    }
}
