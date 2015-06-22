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

    public function users()
    {
        $users = $this->form->repository->all();

        return View::make('admin.users')
                ->withUsers($users)->withActive('users');
    }

    public function banUser($id)
    {
        $this->form->banUser($id, Input::all());

        return Redirect::route('admin.users')
                ->withSuccess('User banned successfully');
    }

    public function unbanUser($id)
    {
        $this->form->unbanUser($id);

        return Redirect::route('admin.users')
                ->withSuccess('User unbanned successfully');

    }

    public function classes()
    {
        $errors = Session::get('errors');
        $errorMessages = [];
        if ($errors != null) {
            $errorMessages = $errors->all();
        }

        $success = Session::get('success');
        $successMessage = '';

        if ($success != null) {
            $successMessage = $success;
        }

        $classes = $this->raceClassForm->repository->all();

        return View::make('admin.classes')
                ->withActive('classes')
                ->withClasses($classes)
                ->withErrors($errorMessages)
                ->withSuccess($successMessage);
    }

    public function storeClass()
    {
        $this->raceClassForm->store(Input::all());

        return Redirect::route('admin.classes')
                ->withSuccess('Successfully created class');
    }

    public function createClass()
    {
        $errors = Session::get('errors');
        $messages = [];
        if ($errors != null) {
            $messages = $errors->all();
        }

        return View::make('admin.create-class')
                ->withErrors($messages)
                ->withActive('classes');
    }

    public function editClass($id)
    {
        $class = $this->raceClassForm->repository->find($id);

        return View::make('admin.edit-class')
                ->withActive('classes')->withClass($class);
    }

    public function updateClass($id)
    {
        $input = Input::all();

        if (Input::exists('active') && $input['active'] == "on") {
            $input['active'] = 1;
        } else {
            $input['active'] = 0;
        }

        $this->raceClassForm->update($id, $input);

        return Redirect::route('admin.classes')
                ->withSuccess('Successfully updated class');
    }

    public function deleteClass()
    {
        if (!Input::exists('class-id')) {
            return Redirect::back()->withErrors(['Missing class id']);
        }

        $this->raceClassForm->delete(Input::get('class-id'));

        return Redirect::route('admin.classes')
                ->withSuccess('Successfully deleted class');
    }
}
