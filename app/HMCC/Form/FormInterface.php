<?php namespace 'HMCC\Form';

interface FormInterface {

	/**
	 * Stores a new record
	 * @param Array $inputs Array of all the inputs for the table
	 * @return boolean Returns TRUE or FALSE depending on if the store was successful
	 */
	public function store(Array $inputs) {};


	/**
	 * Updated a record using the $id
	 * @param Integer $id The id of the record wanting to be changed.
	 * @param Array $inputs Array of all the inputs for the table.
	 * @return boolean Returns TRUE or FALSE depending on if the update was successful.
	 */
	public function update($id, Array $inputs) {};

	/**
	 * Deletes the record specified by $id
	 * @param Integer $id The id of the record you want to delete.
	 * @return boolean Returns TRUE or FALSE depending on if the delete was successful.
	 */
	public function delete($id) {};



}
