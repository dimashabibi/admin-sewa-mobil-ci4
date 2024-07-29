<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Auth Routes
$routes->get('/', 'AuthController::login');
$routes->post('/proses_login', 'AuthController::proses_login');
$routes->get('/register', 'AuthController::register');
$routes->post('/proses_register', 'AuthController::proses_register');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/home', 'HomeController::home', ['filter' => 'authFilter']);

// User Routes
$routes->get('/list_user', 'UserController::index', ['filter' => 'authFilter']);
$routes->post('/tambah_user', 'UserController::store', ['filter' => 'authFilter']);
$routes->post('/edit_user/(:num)', 'UserController::edit_user/$1', ['filter' => 'authFilter']);
$routes->get('/delete_user/(:num)', 'UserController::delete_user/$1', ['filter' => 'authFilter']);

// Kendaraan Routes
$routes->get('/list_kendaraan', 'KendaraanController::index', ['filter' => 'authFilter']);
$routes->post('/tambah_kendaraan', 'KendaraanController::store', ['filter' => 'authFilter']);
$routes->post('/edit_kendaraan/(:num)', 'KendaraanController::edit_kendaraan/$1', ['filter' => 'authFilter']);
$routes->get('/delete_kendaraan/(:num)', 'KendaraanController::delete_kendaraan/$1', ['filter' => 'authFilter']);

// Driver Routes
$routes->get('/list_driver', 'DriverController::index', ['filter' => 'authFilter']);
$routes->post('/tambah_driver', 'DriverController::store', ['filter' => 'authFilter']);
$routes->post('/edit_driver/(:num)', 'DriverController::edit_driver/$1', ['filter' => 'authFilter']);
$routes->get('/delete_driver/(:num)', 'DriverController::delete_driver/$1', ['filter' => 'authFilter']);

// Reservasi Routes
$routes->get('/list_reservasi', 'ReservasiController::index', ['filter' => 'authFilter']);
$routes->get('/create_reservasi', 'ReservasiController::create_reservasi', ['filter' => 'authFilter']);
$routes->post('/save_reservasi', 'ReservasiController::store', ['filter' => 'authFilter']);
$routes->post('/edit_reservasi/(:num)', 'ReservasiController::edit_reservasi/$1', ['filter' => 'authFilter']);
$routes->get('/delete_reservasi/(:num)', 'ReservasiController::delete_reservasi/$1', ['filter' => 'authFilter']);
$routes->post('/terima_reservasi/(:num)', 'ReservasiController::terima/$1', ['filter' => 'authFilter']);
$routes->post('/tolak_reservasi/(:num)', 'ReservasiController::tolak/$1', ['filter' => 'authFilter']);
$routes->post('/selesai_reservasi/(:num)', 'ReservasiController::selesai/$1', ['filter' => 'authFilter']);

//approver routes
$routes->get('/list_kendaraan_approver', 'KendaraanController::approver_kendaraan', ['filter' => 'authFilter']);
$routes->get('/list_driver_approver', 'DriverController::approver_driver', ['filter' => 'authFilter']);
$routes->get('/list_reservasi_approver', 'ReservasiController::approver_reservasi', ['filter' => 'authFilter']);
$routes->post('/terima_reservasi_approver/(:num)', 'ReservasiController::terima_approver/$1', ['filter' => 'authFilter']);
$routes->post('/tolak_reservasi_approver/(:num)', 'ReservasiController::tolak_approver/$1', ['filter' => 'authFilter']);
