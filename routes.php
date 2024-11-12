<?php

// $router->get('/test', function () {
//   echo 'Dit is de index vanuit de route';
// });
$router->setNamespace('\App\Controllers');

// Home and main routes
$router->get('/', 'HomeController@index');
$router->get('/beers', 'BeerController@beers');
$router->get('/breweries', 'BeerController@breweries');
$router->get('/reviews', 'ReviewController@reviews');
$router->get('/beers/add', 'BeerController@add');

// Detail route with parameter named `id`
$router->get('/beers/{id:\d+}', 'BeerController@detail');

// Routes for saving, editing, and deleting beers
$router->post('/beers/add', 'BeerController@save');
$router->post('/beers/delete/{id}', 'BeerController@delete');
$router->get('/beers/edit/{id}', 'BeerController@edit');
$router->post('/beers/update/{id}', 'BeerController@update');
