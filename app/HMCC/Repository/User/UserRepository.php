<?php namespace HMCC\Repository\User;

use HMCC\Repository\Repository;
use User;
use Hash;
use Auth;

class UserRepository extends Repository
{
  public function __construct(User $user)
  {
    $this->model = $user;
  }

  public function store($data)
  {
    $record = new $this->model;
    $record->forename = $data['forename'];
    $record->surname = $data['surname'];
    $record->email = $data['email'];
    $record->password = Hash::make($data['password'] . $data['secret']);
    $record->secret = $data['secret'];
    $record->brca = $data['brca'];
    $record->is_old_pass = isset($data['is_old_pass']) ? $data['is_old_pass'] : false;

    return $record->save();
  }

  public function getSecret($email)
  {
    $user =  $this->model->where('email', '=', $email)->first();

    if($user == null)
      return '';

    return $user->secret;
  }

  public function passwordUpdate($id, $newPassword)
  {
    $user = $this->model->findOrFail($id);

    if (Auth::user()->secret == "")
    {
      Auth::user()->secret = str_random(15);
      Auth::user()->save();
    }

    $user->password = Hash::make($newPassword . Auth::user()->secret);

    return $user->save();
  }

  public function banUser($id, $reason)
  {
    $user = $this->model->findOrFail($id);

    $user->banned_reason = $reason;
    $user->banned = time();

    return $user->save();
  }

  public function unbanUser($id)
  {
    $user = $this->model->findOrFail($id);

    $user->banned_reason = '';
    $user->banned = 0;

    return $user->save();
  }

  public function userHasOldPassword($email)
  {
    $user = $this->model->where('email', '=', $email)->first();

    if($user == null)
      return false;

    return $user->is_old_pass == 1;
  }

  public function checkOldPassword($email, $password)
  {
    $user = $this->model->where('email', '=', $email)
                        ->where('password', '=', Hash::make($password . $email))
                        ->first();

    return $user != null;
  }

  public function getIdByEmail($email)
  {
    $user = $this->model->where('email', '=', $email)->first();

    if($user == null)
      return -1;

    return $user->id;
  }

}
