<?php

namespace App\Controllers;

use App\Models\Location;

class LocationController extends BaseController
{
  public static function list()
  {
    $locations = Location::all();
    self::loadView('locations/list', [
      'title' => 'Locations',
      'locations' => $locations
    ]);
  }

  public static function view($id)
  {
    $location = Location::find($id);
    if (!$location) {
      self::loadView('errors/404', ['title' => 'Location Not Found']);
      return;
    }
    self::loadView('locations/view', [
      'title' => 'Location Details',
      'location' => $location
    ]);
  }
}
