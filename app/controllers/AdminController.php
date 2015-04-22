<?php

use HMCC\Form\User\UserForm;
use HMCC\Form\RaceEvent\RaceClassForm;

class AdminController extends BaseController {

    /**
    *  @var UserForm
    */
    protected $form;

    /**
    * @var RaceClassForm
    */
    protected $raceClassForm;

    public function __construct(UserForm $form, RaceClassForm $raceClassForm)
    {
        $this->form = $form;
        $this->raceClassForm = $raceClassForm;
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
        $classes = $this->raceClassForm->repository->all();

        return View::make('admin.classes')->withActive('classes')->withClasses($classes);
    }

    public function editClass($id)
    {
        $class = $this->raceClassForm->repository->find($id);

        return View::make('admin.edit-class')->withActive('classes')->withClass($class);
    }

    public function updateClass($id)
    {
        $this->raceClassForm->update($id, Input::all());

        return Redirect::route('admin.classes')->withSuccess('Successfully updated class');
    }
}
