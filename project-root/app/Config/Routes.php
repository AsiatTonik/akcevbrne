<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::hlavni');
$routes->get('udalost/(:num)', 'Home::udalost/$1');
$routes->get('probihlo', 'Home::probehle');



$routes->get('/login', 'Auth::login'); 
$routes->post('/loginProcess', 'Auth::processLogin'); 
$routes->get('/logout', 'Auth::logout');


$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Admin::index');
    $routes->get('events', 'Admin::events');
    $routes->get('event/edit/(:num)', 'Admin::editEvent/$1'); 
    $routes->post('update-event/(:num)', 'Admin::updateEvent/$1');
});








