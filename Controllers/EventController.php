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

  public static function create()
  {
    $locations = Location::all();
    $categories = Category::all();
    self::loadView('events/create', [
      'title' => 'Add Event',
      'locations' => $locations,
      'categories' => $categories
    ]);
  }

  public static function store()
  {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $start_date = $_POST['start_date'] ?? null;
    $end_date = $_POST['end_date'] ?? null;
    $location_id = $_POST['location_id'] ?? null;
    $category_id = $_POST['category_id'] ?? null;
    $image = $_POST['image'] ?? null;
    if ($name && $start_date && $end_date && $location_id && $category_id) {
      Event::create([
        'name' => $name,
        'description' => $description,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'location_id' => $location_id,
        'category_id' => $category_id,
        'image' => $image
      ]);
      self::redirect('/events');
    } else {
      $locations = Location::all();
      $categories = Category::all();
      self::loadView('events/create', [
        'title' => 'Add Event',
        'locations' => $locations,
        'categories' => $categories,
        'error' => 'All fields except image are required.'
      ]);
    }
  }

  public static function edit($id)
  {
    $event = Event::find($id);
    if (!$event) {
      self::loadView('errors/404', ['title' => 'Event Not Found']);
      return;
    }
    $locations = Location::all();
    $categories = Category::all();
    self::loadView('events/edit', [
      'title' => 'Edit Event',
      'event' => $event,
      'locations' => $locations,
      'categories' => $categories
    ]);
  }

  public static function update($id)
  {
    $event = Event::find($id);
    if (!$event) {
      self::loadView('errors/404', ['title' => 'Event Not Found']);
      return;
    }
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $start_date = $_POST['start_date'] ?? null;
    $end_date = $_POST['end_date'] ?? null;
    $location_id = $_POST['location_id'] ?? null;
    $category_id = $_POST['category_id'] ?? null;
    $image = $_POST['image'] ?? null;
    if ($name && $start_date && $end_date && $location_id && $category_id) {
      $event->name = $name;
      $event->description = $description;
      $event->start_date = $start_date;
      $event->end_date = $end_date;
      $event->location_id = $location_id;
      $event->category_id = $category_id;
      $event->image = $image;
      $event->save();
      self::redirect('/events');
    } else {
      $locations = Location::all();
      $categories = Category::all();
      self::loadView('events/edit', [
        'title' => 'Edit Event',
        'event' => $event,
        'locations' => $locations,
        'categories' => $categories,
        'error' => 'All fields except image are required.'
      ]);
    }
  }

  public static function delete($id)
  {
    $event = Event::find($id);
    if ($event) {
      $event->delete();
    }
    self::redirect('/events');
  }
}
