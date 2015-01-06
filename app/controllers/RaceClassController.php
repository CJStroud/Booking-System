<?php

use HMCC\Form\RaceEvent\RaceClassForm;

class RaceClassController extends \BaseController {

  /**
   * @var RaceClassForm
   */
  protected $form;

  public function __constructor(RaceClassForm $form)
  {
    $this->form = $form;
  }

  /**
   * Stores a new class record
   * @returns Laravel Redirect Back
   */
  public function store()
  {
    $this->form->store(Input::all());
    return Redirect::to('/admin');
  }

  /**
   * Deletes a class record
   * @param   integer  $id The id of the class record to be destroyed
   * @returns Redirect laravel redirect
   */
  public function destroy($id)
  {
    $this->form->repository->delete($id);
    return Redirect::to('/admin');
  }

  /**
   * Disable a class
   * @param   integer  $id The id of the class to be disabled
   * @returns Redirect laravel redirect
   */
  public function disable($id)
  {
    $this->form->repository->disable($id);
    return Redirect::to('/admin');
  }

  /**
   * Enable a class
   * @param   integer  $id The id of the class to be enabled
   * @returns Redirect laravel redirect
   */
  public function enable($id)
  {
    $this->form->repository->enable($id);
    return Redirect::to('/admin');
  }

}
