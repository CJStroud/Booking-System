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

    return View::make('admin.users')->withUsers($users)->withActive('users');
  }

  public function banUser($id)
  {
    $this->form->banUser($id, Input::all());

    return Redirect::route('admin.users')->withSuccess('User banned successfully');
  }

  public function unbanUser($id)
  {
    $this->form->unbanUser($id);

    return Redirect::route('admin.users')->withSuccess('User unbanned successfully');

  }

  public function classes()
  {
    return View::make('admin.classes')->withActive('classes');
  }
}
