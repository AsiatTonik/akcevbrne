<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::hlavni');
$routes->get('udalost/(:num)', 'Home::udalost/$1');
$routes->get('login', 'Home::login');
$routes->get('import', 'Import_data::index');


