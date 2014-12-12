<?php namespace 'HMCC\Form';

use HMCC\Repository\RepositoryInterface;
use HMCC\Validation\ValidatorInterface;

abstract class Form implements FormInterface
{

	/**
	 * @var RepositoryInterface
	 */
	protected $repository;

	/**
	 * @var ValidatorInterface
	 */
	protected $validator;

	public function __construct(RepositoryInterface $repository, ValidatorInterface $validator)
	{
		$this->repository = $repository;

		$this->validator = $validator;

	}

	/**
	 * Stores a new record. First validating it using the validator then storing it via the repository
	 * @param Array $inputs Array of all the inputs for the table
	 * @return boolean Returns TRUE or FALSE depending on if the store was successful
	 */
	public function store(Array $inputs)
	{
		$this->validate($inputs);

		return $this->repository->store($inputs);
	}

	/**
	 * Updated a record using the $id. First validating the inputs then storing via the repository
	 * @param Integer $id The id of the record wanting to be changed.
	 * @param Array $inputs Array of all the inputs for the table.
	 * @return boolean Returns TRUE or FALSE depending on if the update was successful.
	 */
	public function update($id, Array $inputs)
	{
		$this->validate($inputs);

		return $this->repository->update($id, $inputs);
	}

	/**
	 * Deletes the record specified by $id
	 * @param Integer $id The id of the record you want to delete.
	 * @return boolean Returns TRUE or FALSE depending on if the delete was successful.
	 */
	public function delete($id)
	{
		$response = $this->repository->delete($id);

		// TODO Check to see how this repsonds to an non-existent id
	}

	/**
	 * Validates the inputs given
	 * @param Array $input An array of all the inputs of the form.
	 */
	public function validate(Array $input)
	{
		if ($this->fails($input)) {

			$errors = $this->validator->errors;

			throw new FormException($errors);
		}
	}

	/**
	* Checks to see if the inputs pass the validation
	* @param  Array $input
	* @return boolean Returns TRUE or FALSE if the form passes validation
	*/
	public function passes(Array $input)
	{
		return $this->validator->passes($input);
	}

	/**
	* Checks to see if the inputs fail the validation
	* @param Array $input
	* @returns boolean Returns TRUE or FALSE if the form fail validation
	*/
	public function fails(array $input)
	{
		return !$this->passes($input);
	}

}
