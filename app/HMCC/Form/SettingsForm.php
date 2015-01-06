<?php namespace HMCC\Form;

use HMCC\Validation\Settings\ProfileValidator;
use HMCC\Validation\Settings\PasswordValidator;
use HMCC\Repository\UserRepository;
use Auth;

class SettingsForm extends Form
{
  /**
   *  @var PasswordValidator
   */
  protected $passwordValidator;

  /**
   * @var ProfileValidator
   */

  protected $profileValidator;

  public function __construct(UserRepository $repository, ProfileValidator $profileValidator, PasswordValidator $passwordValidator)
  {
    $this->repository = $repository;
    $this->validator = $profileValidator;
    $this->profileValidator = $profileValidator;
    $this->passwordValidator = $passwordValidator;
  }

  /**
   * This will update the user record
   * @param Array $data An array of all the inputs from the form.
   */
  public function profileUpdate($data)
  {
    $this->validator = $this->profileValidator;

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

    return parent::update(Auth::id(), $data);
  }

  /**
   * Validates and updates the password for the user
   * @param   Array    $data An array of all the inputs for the password update. old-password, new-password, new-password-confirmation
   * @returns [[Type]] [[Description]]
   */
  public function passwordUpdate($data)
  {
    $this->validator = $this->passwordValidator;

    $this->validate($data);

    return $this->repository->passwordUpdate(Auth::id(), $data['new-password']);
  }
}
