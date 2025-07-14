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
$routes->get('dashboard/admin', 'User::index');
$routes->get('dashboard/admin/create', 'User::create');
$routes->post('dashboard/admin/store', 'User::store');
$routes->get('dashboard/admin/edit/(:num)', 'User::edit/$1');
$routes->post('dashboard/admin/update/(:num)', 'User::update/$1');
$routes->post('dashboard/admin/delete/(:num)', 'User::delete/$1');

