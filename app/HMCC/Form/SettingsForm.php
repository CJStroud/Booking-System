<?php namespace HMCC\Form;

use HMCC\Validation\Settings\ProfileValidator;
use HMCC\Repository\UserRepository;
use Auth;

class SettingsForm extends Form
{
  public function __construct(UserRepository $repository, ProfileValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  public function profileUpdate($data)
  {
    $user = Auth::user();

    $inputs = array_keys($data);

    foreach ($inputs as $key)
    {
      if($user[$key] !== null)
      {
        if ($data[$key] == $user[$key])
        {
          unset($data[$key]);
        }
      }
    }

    parent::update(Auth::id(), $data);
  }
}
