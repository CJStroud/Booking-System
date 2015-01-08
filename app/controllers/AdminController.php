<?php

use HMCC\Form\User\UserForm;

class AdminController extends BaseController {

  /**
   *  @var UserForm
   */
  protected $form;

  public function __construct(UserForm $form)
  {
    $this->userForm = $form;
  }


  public function home()
  {
      return View::make('admin.home')->withActive('home');
  }

  public function users()
  {
    $users = $this->form->repository->GetUnbannedUsers();

    $bannedUsers = $this->form->repository->GetBannedUsers();


    return View::make('admin.users')->withUsers($users)->withBanned($bannedUsers)->withActive('users');
  }
}
