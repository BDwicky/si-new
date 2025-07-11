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
$routes->get('dashboard/super-admin', 'SuperAdmin::index');
$routes->get('dashboard/super-admin/ukm', 'SuperAdmin::ukm');



// routes admin
$routes->get('dashboard/admin', 'Admin::index');
$routes->get('dashboard/admin/struktur-ukm', 'Admin::strukturUKM');
$routes->get('dashboard/admin/kalender', 'Admin::kalender');
$routes->get('dashboard/admin/list-anggota', 'Admin::listAnggota');
$routes->get('dashboard/admin/pendaftar', 'Admin::pendaftar');
$routes->get('dashboard/admin/tempt', 'Admin::tempt');






// routes user
$routes->get('dashboard/user', 'Mahasiswa::index');
$routes->get('mahasiswa/', 'Mahasiswa::create'); //register
$routes->post('mahasiswa/store', 'Mahasiswa::store');
$routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
$routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->get('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');
