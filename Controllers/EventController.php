<?php

namespace App\Controllers;

use App\Models\Event;
use App\Models\Location;
use App\Models\Category;

class EventController extends BaseController
{
  public static function list()
  {
    $events = Event::all();
    $locations = Location::all();
    $categories = Category::all();
    self::loadView('events/list', [
      'title' => "Eventpage",
      'events' => $events,
      'locations' => $locations,
      'categories' => $categories
    ]);
  }

  public static function view($id)
  {
    $event = Event::find($id);
    if (!$event) {
      self::loadView('errors/404', ['title' => 'Event Not Found']);
      return;
    }
    self::loadView('events/view', [
      'title' => 'Event Details',
      'event' => $event
    ]);
  }
}
