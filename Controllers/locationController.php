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

  public static function create()
  {
    self::loadView('locations/create', [
      'title' => 'Add Location'
    ]);
  }

  public static function store()
  {
    $name = trim($_POST['name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $country = trim($_POST['country'] ?? '');
    if ($name && $address && $city && $country) {
      \App\Models\Location::create([
        'name' => $name,
        'address' => $address,
        'city' => $city,
        'country' => $country
      ]);
      self::redirect('/locations');
    } else {
      self::loadView('locations/create', [
        'title' => 'Add Location',
        'error' => 'All fields are required.'
      ]);
    }
  }

  public static function edit($id)
  {
    $location = Location::find($id);
    if (!$location) {
      self::loadView('errors/404', ['title' => 'Location Not Found']);
      return;
    }
    self::loadView('locations/edit', [
      'title' => 'Edit Location',
      'location' => $location
    ]);
  }

  public static function update($id)
  {
    $location = Location::find($id);
    if (!$location) {
      self::loadView('errors/404', ['title' => 'Location Not Found']);
      return;
    }
    $name = trim($_POST['name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $country = trim($_POST['country'] ?? '');
    if ($name && $address && $city && $country) {
      $location->name = $name;
      $location->address = $address;
      $location->city = $city;
      $location->country = $country;
      $location->save();
      self::redirect('/locations');
    } else {
      self::loadView('locations/edit', [
        'title' => 'Edit Location',
        'location' => $location,
        'error' => 'All fields are required.'
      ]);
    }
  }

  public static function delete($id)
  {
    $location = Location::find($id);
    if ($location) {
      $location->delete();
    }
    self::redirect('/locations');
  }
}
