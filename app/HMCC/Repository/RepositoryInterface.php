<?php namespace HMCC\Repository;

interface RepositoryInterface
{
	// TODO Comment Repository Interface
	public function all();

	public function store($data);

	public function delete($id);

	public function update($id, $data);

	public function find($id);
}
