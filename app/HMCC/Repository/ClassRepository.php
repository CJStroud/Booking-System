<?php namespace HMCC\Repository;

class ClassRepository extends Repository
{
	public function __construct(Class $class)
	{
		$this->model = $class;
	}
}
