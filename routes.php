<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/events', 'EventController@list');
$router->get('/events/(\d+)', 'EventController@view');
$router->get('/users', 'UserController@list');
$router->get("/users/(\d+)", 'UserController@view');
$router->post('/users/(\d+)/delete', 'UserController@delete');
$router->get('/locations', 'LocationController@list');
$router->get('/locations/(\d+)', 'LocationController@view');
$router->get('/users/create', 'UserController@create');
$router->post('/users', 'UserController@store');
$router->get('/users/(\d+)/edit', 'UserController@edit');
$router->post('/users/(\d+)/update', 'UserController@update');
$router->get('/events/create', 'EventController@create');
$router->post('/events', 'EventController@store');
$router->get('/events/(\d+)/edit', 'EventController@edit');
$router->post('/events/(\d+)/update', 'EventController@update');
$router->post('/events/(\d+)/delete', 'EventController@delete');
