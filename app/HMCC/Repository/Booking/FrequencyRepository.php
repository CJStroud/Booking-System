<?php namespace HMCC\Repository\Booking;

use HMCC\Repository\Repository;
use Frequency;

class FrequencyRepository extends Repository
{
  public function __construct(Frequency $frequency)
  {
    parent::__construct($frequency);
  }
}
