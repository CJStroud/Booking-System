<?php namespace HMCC\Repository;

use Frequency;

class FrequencyRepository extends Repository
{
	public function __construct(Frequency $frequency)
	{
		$this->model = $frequency;
	}
}
