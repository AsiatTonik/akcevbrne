<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::hlavni');
$routes->get('udalost/(:num)', 'Home::udalost/$1');
$routes->get('probihlo', 'Home::probehle');

$routes->get('login', 'Auth::login');
$routes->post('auth/processLogin', 'Auth::processLogin');
$routes->get('auth/logout', 'Auth::logout');


$routes->get('admin', 'Admin::index');

$routes->get('admin/events', 'Admin::events');
$routes->get('admin/edit-event/(:num)', 'Admin::editEvent/$1');
$routes->post('admin/update-event/(:num)', 'Admin::updateEvent/$1');


