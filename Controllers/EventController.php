<?php

namespace App\Controllers;

class EventController extends BaseController
{
  public static function list()
  {
    self::loadView('events/list', [
      'title' => "Eventpage"
    ]);
  }
}
