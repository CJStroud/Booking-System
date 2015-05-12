<?php namespace HMCC\Form\User;

use Illuminate\Support\MessageBag;
use HMCC\Validation\User\UserValidator;
use HMCC\Repository\User\UserRepository;
use HMCC\Form\Form;
use HMCC\Form\FormException;
use Auth;

class UserForm extends Form {

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        parent::__construct($repository, $validator);
    }

    public function store(Array $inputs)
    {
        $secret = str_random(15);
        $inputs['secret'] = $secret;

        return parent::store($inputs);
    }

    public function checkLogin($email, $password) {
        $isUsingOldPassword = $this->repository->userHasOldPassword($email);

        if ($isUsingOldPassword) {
            if (Auth::attempt(array('email' => $email, 'password' => $password . $email))) {
                $id = $this->repository->getIdByEmail($email);
                $this->repository->passwordUpdate($id, $password);
                Auth::user()->is_old_pass = false;
                Auth::user()->save();
            }
        }

        //dd(Auth::user());

        $secret = $this->repository->getSecret($email);

        // append secret to password
        $password = $password . $secret;

        $errors = new MessageBag();

        if (!Auth::attempt(array('email' => $email, 'password' => $password)))
        {
            $errors->add('incorrect details', 'The details you entered where incorrect');

            throw new FormException($errors);
        }

        if (Auth::user()->banned > 0)
        {
            $banned_message = 'You have been banned by the administrator because "' . Auth::user()->banned_reason . '"';

            $errors->add('banned user', $banned_message);

            Auth::logout();

            throw new FormException($errors);
        }

        return true;
    }

    public function banUser($id, $data)
    {
        $errors = new MessageBag();

        if (!isset($data['reason']) || $data['reason'] == '')
        {
            $errors->add('reason', 'Reason is required');

            throw new FormException($errors);
        }

        $this->repository->banUser($id, $data['reason']);
    }

    public function unbanUser($id)
    {
        $this->repository->unbanUser($id);
    }

}
