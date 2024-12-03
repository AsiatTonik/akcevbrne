<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('udalost', 'Home::udalost');
$routes->get('login', 'Home::login');

