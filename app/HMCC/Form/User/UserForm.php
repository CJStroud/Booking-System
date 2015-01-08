<?php namespace HMCC\Form\User;

use Illuminate\Support\MessageBag;
use HMCC\Validation\User\UserValidator;
use HMCC\Repository\User\UserRepository;
use HMCC\Form\Form;
use HMCC\Fomr\FormException;
use Hash;
use Auth;

class UserForm extends Form
{
  public function __construct(UserRepository $repository, UserValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  public function store(Array $inputs)
  {
    $secret = str_random(15);
    $inputs['secret'] = $secret;

    return parent::store($inputs);
  }

  public function checkLogin($email, $password)
  {
    $secret = $this->repository->getSecret($email);

    // append secret to password
    $password =  $password . $secret;


    if (Auth::attempt(array('email' => $email, 'password' => $password)))
    {
      return true;
    }

    return false;
  }

  public function banUser($id, $data)
  {
    $errors = new MessageBag();

    if (!isset($data['reason']))
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
