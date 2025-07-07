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

  public static function delete($id)
  {
    $user = User::find($id);
    if ($user) {
      $user->delete();
    }
    self::redirect('/users');
  }

  public static function create()
  {
    self::loadView('users/create', [
      'title' => 'Add User'
    ]);
  }

  public static function store()
  {
    // Simpele validatie
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $profile_picture = $_POST['profile_picture'] ?? null;
    if ($name && $email) {
      User::create([
        'name' => $name,
        'email' => $email,
        'profile_picture' => $profile_picture
      ]);
      self::redirect('/users');
    } else {
      self::loadView('users/create', [
        'title' => 'Add User',
        'error' => 'Name and email are required.'
      ]);
    }
  }

  public static function edit($id)
  {
    $user = User::find($id);
    if (!$user) {
      self::loadView('errors/404', ['title' => 'User Not Found']);
      return;
    }
    self::loadView('users/edit', [
      'title' => 'Edit User',
      'user' => $user
    ]);
  }

  public static function update($id)
  {
    $user = User::find($id);
    if (!$user) {
      self::loadView('errors/404', ['title' => 'User Not Found']);
      return;
    }
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $profile_picture = $_POST['profile_picture'] ?? null;
    if ($name && $email) {
      $user->name = $name;
      $user->email = $email;
      $user->profile_picture = $profile_picture;
      $user->save();
      self::redirect('/users');
    } else {
      self::loadView('users/edit', [
        'title' => 'Edit User',
        'user' => $user,
        'error' => 'Name and email are required.'
      ]);
    }
  }
}
