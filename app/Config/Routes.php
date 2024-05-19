<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'Login::index');

$routes->get('daftar', 'Daftar::index');
$routes->post('daftar', 'Daftar::create');

/* $routes->get('home', 'Home::index'); */

$routes->get('home', 'Home::index');
/* $routes->get('home', 'Home::index', ['filter' => 'jwt']);
$routes->get('produk', 'Produk::index', ['filter' => 'jwt']);
$routes->get('profil', 'Profil::index', ['filter' => 'jwt']); */
$routes->get('produk/export', 'Produk::exportExcel');

$routes->get('accessdenied', 'AccessDenied::index');
