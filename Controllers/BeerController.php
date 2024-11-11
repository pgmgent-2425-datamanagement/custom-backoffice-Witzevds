<?php

namespace App\Controllers;

use App\Models\BeerModel;
use App\Models\ReviewModel;

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

  public function delete($db, $id)
  {
    $beerModel = new BeerModel($db);
    $beerModel->delete($id);
    self::redirect('/beers');
  }
}
