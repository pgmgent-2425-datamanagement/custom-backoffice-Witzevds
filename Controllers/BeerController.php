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

    // Fetch data from each model
    $beers = $beerModel->all();
    $reviews = $reviewModel->all();

    // Pass both beers and reviews data to the view
    self::loadview('/beers', ['beers' => $beers, 'reviews' => $reviews]);
  }
}
