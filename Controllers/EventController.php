<?php

namespace App\Controllers;

use App\Models\Event;

class EventController extends BaseController
{
  public static function list()
  {

    $list = Event::all();
    print_r($list);

    self::loadView('events/list', [
      'title' => "Eventpage",
      'events' => $list
    ]);
  }
}
