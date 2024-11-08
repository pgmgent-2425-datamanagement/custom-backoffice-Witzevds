<?php

namespace App\Controllers;

use App\Models\BeerModel;
use App\Models\ReviewModel;

class BeerController extends BaseController
{
  public static function beers()
  {
    // Instantiate both models
    $beerModel = new BeerModel();
    $reviewModel = new ReviewModel();
    $search = $_GET['search'] ?? '';
    // Fetch data from each model
    $beers = $beerModel::search($search);
    $reviews = $reviewModel::all();
    //zoekterm opvangen


    print_r($search);
    // Pass both beers and reviews data to the view
    self::loadview('/beers/beers', ['beers' => $beers, 'reviews' => $reviews]);
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
}
