<?php

namespace App\Controllers;

use App\Models\BeerModel;
use App\Models\ReviewModel;
use App\Models\BreweryModel;

class BeerController extends BaseController
{

  public static function beers()
  {

    $beerModel = new BeerModel();
    $reviewModel = new ReviewModel();
    $search = $_GET['search'] ?? '';

    $beers = $beerModel::search($search);
    $reviews = $reviewModel::all();


    print_r($search);
    // Pass both beers and reviews data to the view
    self::loadview('/beers/beers', ['beers' => $beers, 'reviews' => $reviews]);
  }

  public static function breweries()
  {

    $beerModel = new BreweryModel();
    $reviewModel = new ReviewModel();
    $search = $_GET['search'] ?? '';

    $beers = $beerModel::search($search);
    $reviews = $reviewModel::all();


    print_r($search);
    // Pass both beers and reviews data to the view
    self::loadview('/beers/beers', ['beers' => $beers, 'reviews' => $reviews]);
  }
  public static function edit($db, $id)
  {
    $beerModel = new BeerModel($db);
    $beer = $beerModel->findById('beer_id', $id);  // Assuming `findById` is accessible and returns the beer data

    self::loadView('beers/edit', ['beer' => $beer]);  // Load the view with the beer data
  }

  // Handle the form submission and save changes
  public static function update($db, $id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $beerModel = new BeerModel($db);

      // Collect form data
      $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'type_id' => $_POST['type_id'],
        'brewery_id' => $_POST['brewery_id'],
        'image_url' => $_POST['image_url'],
        'alcohol_percentage' => $_POST['alcohol_percentage']
      ];

      // Update the record
      $beerModel->update($id, $data);  // Assumes `update` is defined in `BeerModel`

      // Redirect to the beers list
      self::redirect('/beers');
    }
  }
  public static function detail($id)
  {

    self::loadView('beers/detail', [
      'beers' => BeerModel::find($id)
    ]);
  }

  public static function add()
  {
    self::loadView('beers/form');
  }


  public static function save()
  {
    $beers = new BeerModel();
    $beers->name = $_POST['name'];
    $beers->description = $_POST['description'];
    $beers->type_id = $_POST['type_id'];
    $beers->brewery_id = $_POST['brewery_id'];
    $beers->image_url = $_POST['image_url'];
    $beers->alcohol_percentage = $_POST['alcohol_percentage'];


    $succes = $beers->save();

    if ($succes) {

      self::redirect('/beers');
    } else {
      echo 'Er is iets misgegaan';
    }
  }

  public static function delete($id)
  {
    global $db;

    $beerModel = new BeerModel($db);
    $beerModel->delete($id);
    self::redirect('/beers');
  }
}
