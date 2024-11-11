<?php

// $router->get('/test', function () {
//   echo 'Dit is de index vanuit de route';
// });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/beers', 'BeerController@beers');
$router->get('/reviews', 'ReviewController@reviews');
$router->get('/beers/add', 'BeerController@add');
$router->get('/beers/{\d+}', 'BeerController@detail');
$router->post('/beers/add', 'BeerController@save');
$router->post('/beers/delete/{id}', function ($id) use ($db) {
  (new App\Controllers\BeerController())->delete($db, $id);
});
