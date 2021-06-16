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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/show', 'Home::show');
$routes->get('/team', 'Home::index');
$routes->get('/video', 'Home::index');
$routes->get('/gallery', 'Home::index');
$routes->get('/blog-list', 'Home::index');
$routes->get('/blog-details', 'Home::index');
$routes->get('/contact', 'Home::index');

/*
$routes->get('/contactslist', 'Ccontacts::index');
$routes->get('/createcontact', 'Ccontacts::vistacrear');
$routes->post('/guardarcontacto', 'Ccontacts::guardarcontacto');
$routes->get('/delete/(:num)', 'Ccontacts::deletecontact/$1');
$routes->get('/edit/(:num)', 'Ccontacts::editcontact/$1');
$routes->post('/updatecontact', 'Ccontacts::updatecontact'); */

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
