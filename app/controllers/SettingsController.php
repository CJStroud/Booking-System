<?php

use HMCC\Form\SettingsForm;

class SettingsController extends \BaseController {

  protected $layout = 'layouts.master';

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

    return View::make('settings.profile')->withUser($user);
  }




}
