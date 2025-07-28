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
$routes->group('dashboard/admin', ['filter' => 'rolecheck'], function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('ukm', 'Admin::listUkm');
    $routes->get('create', 'Admin::create');
    $routes->post('store', 'Admin::store');
    $routes->get('edit/(:num)', 'Admin::edit/$1');
    $routes->post('update/(:num)', 'Admin::update/$1');
    $routes->delete('delete/(:num)', 'Admin::delete/$1');
});

// routes admin UKM
$routes->get('dashboard/ukm', 'Ukm::StrukturUKM');
$routes->get('dashboard/ukm/kalender', 'Ukm::kalender');
$routes->get('dashboard/ukm/list-anggota', 'Ukm::listAnggota');
$routes->get('dashboard/ukm/pendaftar', 'Ukm::pendaftar');
$routes->get('dashboard/ukm/tempt', 'Ukm::tempt');

// routes user
$routes->get('dashboard/user', 'User::index');
$routes->get('dashboard/user/edit-profile', 'User::editProfile');
$routes->post('dashboard/user/update-profile', 'User::updateProfile');
