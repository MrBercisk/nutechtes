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
$routes->get('home', 'Home::index');
$routes->get('produk/export', 'Produk::exportExcel');

$routes->get('accessdenied', 'AccessDenied::index');
