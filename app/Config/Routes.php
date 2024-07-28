<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->post('/proses_login', 'AuthController::proses_login');
$routes->get('/register', 'AuthController::register');
$routes->post('/proses_register', 'AuthController::proses_register');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/home', 'HomeController::home', ['filter' => 'authFilter']);

$routes->get('/list_user', 'UserController::index', ['filter' => 'authFilter']);
$routes->post('/tambah_data', 'UserController::store', ['filter' => 'authFilter']);
$routes->post('/edit_user/(:num)', 'UserController::edit_user/$1', ['filter' => 'authFilter']);
$routes->get('/delete_user/(:num)', 'UserController::delete_user/$1', ['filter' => 'authFilter']);


$routes->get('/list_kendaraan', 'KendaraanController::index', ['filter' => 'authFilter']);
$routes->post('/tambah_data', 'UserController::store', ['filter' => 'authFilter']);
$routes->post('/edit_user/(:num)', 'UserController::edit_user/$1', ['filter' => 'authFilter']);
$routes->get('/delete_user/(:num)', 'UserController::delete_user/$1', ['filter' => 'authFilter']);
