<?php namespace HMCC\Form;

class BookingForm extends Form
{
	public function __construct(BookingRepository $repository, BookingValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function store(Array $inputs)
	{
		// Todo change the input names to be more standardised
		$unique = $this->repository->unique($inputs['event-id'], $inputs['class-drop-down'], Auth::id());

		dd($unique);

		return parent::store($inputs);
	}
}
