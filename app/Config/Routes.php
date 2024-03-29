<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', function ($routes) {
    $routes->resource('users');
});

$routes->group('api', function ($routes) {
    $routes->resource('produk');
});

$routes->group('api', function ($routes) {
    $routes->resource('komen');
});
