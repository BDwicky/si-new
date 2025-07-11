<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/**
 * PUBLIC ROUTES
 */

//routig page
$routes->get('/', 'Home::index');

// routig detail
$routes->get('/detail-ukm', 'DetailUkm::index');

// routes login
$routes->get('login', 'Login::index');
$routes->post('/login', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// routes register
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::store');

/**
 * PRIVATE ROUTES
 */

// routes super admin (admin universitas)   
$routes->get('dashboard/users', 'User::index');
$routes->get('dashboard/users/create', 'User::create');
$routes->post('dashboard/users/store', 'User::store');
$routes->get('dashboard/users/edit/(:num)', 'User::edit/$1');
$routes->post('dashboard/users/update/(:num)', 'User::update/$1');
$routes->post('dashboard/users/delete/(:num)', 'User::delete/$1');

