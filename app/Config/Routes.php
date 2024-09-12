<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->match(['get', 'post'], '/', 'Home::index', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'editUser/(:any)', 'Home::editUser/$1', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'deleteUser/(:any)', 'Home::deleteUser/$1', ['filter' => 'noauth']);

// $routes->get('/signup', 'Home::signup', ['filter' => 'noauth']);
$routes->match(['get', 'post'], 'signup', 'Home::signup', ['filter' => 'noauth']);
$routes->get('dashboard', 'Home::dashboard', ['filter' => 'auth']);
$routes->get('logout', 'Home::logout');
