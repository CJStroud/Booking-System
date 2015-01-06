<?php namespace HMCC\Form;

use Illuminate\Support\MessageBag;
use HMCC\Validation\Settings\ProfileValidator;
use HMCC\Validation\Settings\PasswordValidator;
use HMCC\Repository\UserRepository;
use Auth;
use Hash;

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
   * @param   Array $data An array of all the inputs for the password update. old-password, new-password, new-password-confirmation
   * @returns Array An array of all the inputs from the form
   */
  public function passwordUpdate($data)
  {
    $this->validator = $this->passwordValidator;

    $this->validate($data);

    return $this->repository->passwordUpdate(Auth::id(), $data['new-password']);
  }

  public function deleteAccount($data)
  {
    $password = $data['delete-password'] . Auth::user()->secret;

    $errors = new MessageBag();

    if (!Hash::check($password, Auth::user()->password))
    {
      $errors->add('delete-password', 'Account delete unsuccessful. Password did not match');
      throw new FormException($errors);
    }

    $this->repository->delete(Auth::id());
  }
}
