<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/events', 'EventController@list');
$router->get('/users', 'UserController@list');
$router->get("/users/(\d+)", 'UserController@view');
