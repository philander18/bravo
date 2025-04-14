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
$routes->post('Home/refresh_tabel_peserta', 'Home::refresh_tabel_peserta');
$routes->post('Home/update_stal1', 'Home::update_stal1');
$routes->post('Home/update_stal2', 'Home::update_stal2');
$routes->post('Home/update_stal3', 'Home::update_stal3');
$routes->post('Home/get_detail_peserta', 'Home::get_detail_peserta');
