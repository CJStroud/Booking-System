<?php namespace HMCC\Form\Booking;

use HMCC\Validation\Booking\BookingValidator;
use HMCC\Repository\Booking\BookingRepository;
use HMCC\Form\Form;

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
