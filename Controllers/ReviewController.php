<?php

namespace App\Controllers;

use App\Models\ReviewModel;

class ReviewController extends BaseController
{
  public static function reviews()
  {
    $list = ReviewModel::all();
    self::loadView('reviews/list', [
      'list' => $list,
      'text' => 'test'
    ]);
  }
}
