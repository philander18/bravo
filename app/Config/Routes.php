<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Home', 'Home::index');
$routes->get('/Home/portal', 'Home::portal');
$routes->get('/Home/keluar', 'Home::keluar');

$routes->post('home/portal', 'Home::portal');
