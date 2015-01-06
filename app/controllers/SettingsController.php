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

    $success = Session::get('success');

    return View::make('settings.profile')->withUser($user)->withActive('profile')->withSuccess($success);
  }

  public function profileUpdate() {
    $this->form->profileUpdate(Input::all());

    return Redirect::route('settings.profile')->withSuccess('Profile updated successfully');
  }

  public function account() {
    $success = Session::get('success');
    return View::make('settings.account')->withActive('account')->withSuccess($success);
  }

  public function accountPassword()
  {
    $this->form->passwordUpdate(Input::all());

    return Redirect::route('settings.account')->withSuccess('Password successfully changed');
  }

  public function accountDelete()
  {
    $this->form->deleteAccount(Input::all());

    Auth::logout();

    return Redirect::route('user.login');
  }
}
