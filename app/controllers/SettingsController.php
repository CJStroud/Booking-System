<?php

use HMCC\Form\SettingsForm;

class SettingsController extends \BaseController {

  /**
   * @var SettingsForm
   */
  protected $form;

  public function __construct(SettingsForm $form)
  {
    $this->form = $form;
  }

  public function profile() {
    $user = $this->form->repository->find(Auth::id());

    return View::make('settings.profile')->withUser($user)->withActive('profile');
  }

  public function profileUpdate() {
    $this->form->profileUpdate(Input::all());

    return Redirect::back()->withSuccess('Profile updated successfully');
  }
}
