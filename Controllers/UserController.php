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
    // Haal tickets op voor deze user
    $user->tickets = method_exists($user, 'getTickets') ? $user->getTickets() : [];
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
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $profile_picture = null;
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
      $ext = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
      $filename = uniqid('profile_') . '.' . $ext;
      $target = __DIR__ . '/../public/uploads/profiles/' . $filename;
      if (!is_dir(dirname($target))) {
        mkdir(dirname($target), 0777, true);
      }
      move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target);
      $profile_picture = $filename;
    }
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
    $profile_picture = $user->profile_picture; // standaard: huidige afbeelding behouden
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
      // Verwijder oude afbeelding indien aanwezig
      if ($user->profile_picture) {
        $oldPath = __DIR__ . '/../public/uploads/profiles/' . $user->profile_picture;
        if (file_exists($oldPath)) {
          unlink($oldPath);
        }
      }
      $ext = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
      $filename = uniqid('profile_') . '.' . $ext;
      $target = __DIR__ . '/../public/uploads/profiles/' . $filename;
      if (!is_dir(dirname($target))) {
        mkdir(dirname($target), 0777, true);
      }
      move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target);
      $profile_picture = $filename;
    }
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
