<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/beers', 'BeerController@beers');
$router->get('/reviews', 'ReviewController@reviews');
