<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

#Rutas estaticas
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');
$routes->get('/about', 'HomeController::about');
$routes->get('/show', 'HomeController::show');
$routes->get('/team', 'HomeController::team');
$routes->get('/video', 'HomeController::video');
$routes->get('/gallery', 'HomeController::gallery');
$routes->get('/blog-list', 'HomeController::bloglist');
$routes->get('/blog-details', 'HomeController::blogdetails');
$routes->get('/contact', 'HomeController::contact');

#Creamos las rutas del admin
$routes->get('/admin/login', 'HomeController::login');
$routes->get('/admin/logout', 'HomeController::logout');
$routes->get('/admin', 'HomeController::admin');

#Creamos las rutas perfiles
$routes->get('/admin/perfil', 'perfilController::index');
$routes->get('/admin/perfil/create', 'perfilController::create');
$routes->get('/admin/perfil/edit/(:num)', 'perfilController::edit/$1');

#Creamos las rutas usuarios
$routes->get('/admin/users', 'usersController::index');
$routes->get('/admin/users/create', 'usersController::create');
$routes->get('/admin/users/edit/(:num)', 'usersController::edit/$1');

#Creamos las rutas horarios
$routes->get('/admin/horario', 'HorarioController::index');
$routes->get('/admin/horario/create', 'HorarioController::create');
$routes->get('/admin/horario/edit/(:num)', 'HorarioController::edit/$1');

#Creamos las rutas videos
$routes->get('/admin/videos', 'videosController::index');
$routes->get('/admin/videos/create', 'videosController::create');
$routes->get('/admin/videos/edit/(:num)', 'videosController::edit/$1');

#Creamos las rutas galery
$routes->get('/admin/galery', 'galeryController::index');
$routes->get('/admin/galery/create', 'galeryController::create');
$routes->get('/admin/galery/edit/(:num)', 'galeryController::edit/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
