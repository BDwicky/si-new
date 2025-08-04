<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =====================
// PUBLIC ROUTES
// =====================

// Halaman utama
$routes->get('/', 'Home::index');

// Detail UKM
$routes->get('/detail-ukm', 'DetailUkm::index');

// Login / Logout
$routes->get('login', 'Login::index');
$routes->post('login', 'Login::auth');
$routes->get('logout', 'Login::logout');

// Register
$routes->get('register', 'Register::index');
$routes->post('register', 'Register::store');

// =====================
// PRIVATE ROUTES
// =====================

// =====================
// DASHBOARD SUPER ADMIN (role = 1)
// =====================
$routes->group('dashboard/admin', ['filter' => 'rolecheck:1'], function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('ukm', 'Admin::listUkm');
    $routes->get('create', 'Admin::create');
    $routes->post('store', 'Admin::store');
    $routes->get('edit/(:num)', 'Admin::edit/$1');
    $routes->post('update/(:num)', 'Admin::update/$1');
    $routes->delete('delete/(:num)', 'Admin::delete/$1');
});

// =====================
// DASHBOARD ADMIN UKM (role = 2)
// =====================
$routes->group('dashboard/ukm', ['filter' => 'rolecheck:2'], function ($routes) {
    $routes->get('ukm', 'Ukm::index');
    $routes->get('/', 'Ukm::StrukturUKM');
    $routes->get('kalender', 'Ukm::kalender');
    $routes->get('list-anggota', 'Ukm::listAnggota');
    $routes->get('pendaftar', 'Ukm::pendaftar');
    $routes->get('tempt', 'Ukm::tempt');

    $routes->post('setujui', 'Ukm::setujuiAnggota');
    $routes->post('tolak', 'Ukm::tolakAnggota');
});

// =====================
// DASHBOARD USER (role = 3)
// =====================
$routes->group('dashboard/user', ['filter' => 'rolecheck:3'], function ($routes) {
    $routes->get('user', 'User::index');
    $routes->get('/', 'User::index');
    $routes->get('edit-profile', 'User::editProfile');
    $routes->post('update-profile', 'User::updateProfile');
});

// =====================
// AKSES DETAIL UKM DAN PENDAFTARAN (TANPA LOGIN)
// =====================
$routes->get('ukm/(:num)', 'Ukm::detail/$1');
$routes->get('ukm/daftar/(:num)', 'Ukm::daftar/$1');

// =====================
// AKSES DITOLAK PAGE
// =====================
$routes->get('akses-ditolak', 'ErrorPage::aksesDitolak');


$routes->get('/dashboard', 'Login::redirectDashboard');
