<?php namespace HMCC\Form;

use HMCC\Validation\BookingValidator;
use HMCC\Repository\BookingRepository;

class BookingForm extends Form
{
	public function __construct(BookingRepository $repository, BookingValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function store(Array $inputs)
	{
		return parent::store($inputs);
	}
}
