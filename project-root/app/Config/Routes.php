<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('udalost/(:num)', 'Home::udalost/$1');
$routes->get('login', 'Home::login');

