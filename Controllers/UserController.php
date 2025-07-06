<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
  public static function list()
  {
    $users = User::all();
    self::loadView('users/list', [
      'title' => 'Users',
      'users' => $users
    ]);
  }
}
