<?php namespace HMCC\Validation\Settings;

use HMCC\Validation\Validator;
use Hash;
use Auth;

class PasswordValidator extends Validator
{
  protected $rules = ['new-password' => 'required|min:6|confirmed'];

  public function passes(Array $inputs)
  {
    $passed = parent::passes($inputs);
    $newPassword = $inputs['old-password'] . Auth::user()->secret;

    if (!Hash::check($newPassword, Auth::user()->password))
    {
      $this->errors->add('old-password', 'Old password is incorrect');
      $passed = false;
    }
    return $passed;
  }
}
