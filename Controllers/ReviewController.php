<?php

namespace App\Controllers;



use App\Models\ReviewModel;

class ReviewController extends BaseController
{
  public static function reviews()
  {
    $reviewsModel = new ReviewModel();
    $reviews = $reviewsModel->all();
    self::loadview('/reviews', ['beers' => $reviews]);
  }
}
