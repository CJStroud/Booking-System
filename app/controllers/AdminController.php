<?php

use HMCC\Form\User\UserForm;

class AdminController extends BaseController {

  /**
   *  @var UserForm
   */
  protected $form;

  public function __construct(UserForm $form)
  {
    $this->form = $form;
  }


  public function home()
  {
      return View::make('admin.home')->withActive('home');
  }

  public function users()
  {
    $users = $this->form->repository->all();

    $bannedUsers = $this->form->repository->GetBannedUsers();


    return View::make('admin.users')->withUsers($users)->withBanned($bannedUsers)->withActive('users');
  }
}
