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

  public static function view($id)
  {
    $user = User::find($id);
    if (!$user) {
      self::loadView('errors/404', ['title' => 'User Not Found']);
      return;
    }
    // Haal events op voor deze user
    $user->events = method_exists($user, 'getEvents') ? $user->getEvents() : [];
    self::loadView('users/view', [
      'title' => 'User Details',
      'user' => $user
    ]);
  }
}
