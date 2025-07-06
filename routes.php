<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/events', 'EventController@list');
$router->get('/events/(\d+)', 'EventController@view');
$router->get('/users', 'UserController@list');
$router->get("/users/(\d+)", 'UserController@view');
$router->get('/locations', 'LocationController@list');
$router->get('/locations/(\d+)', 'LocationController@view');
