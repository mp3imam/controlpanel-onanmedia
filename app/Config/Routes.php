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

// Routing Modul OnanApps
$routes->group('onanapps', static function ($routes) {
    $routes->post('datagrid/([a-zA-Z0-9_]+)', 'Onan::get_data_grid/$1');
    $routes->get('grid/([a-zA-Z0-9_]+)', 'Onan::get_grid/$1');
    $routes->post('form/([a-zA-Z0-9_]+)', 'Onan::get_form/$1');
    $routes->post('display/([a-zA-Z0-9_]+)', 'Onan::getdisplay/$1');
    $routes->post('simpan/([a-zA-Z0-9_]+)', 'Onan::simpandata/$1');

});

// Routing Modul Master Data
$routes->group('master', static function ($routes) {
    $routes->post('datagrid/([a-zA-Z0-9_]+)', 'Master::get_data_grid/$1');
    $routes->get('grid/([a-zA-Z0-9_]+)', 'Master::get_grid/$1');
    $routes->post('form/([a-zA-Z0-9_]+)', 'Master::get_form/$1');
    $routes->post('display/([a-zA-Z0-9_]+)', 'Master::getdisplay/$1');
    $routes->post('simpan/([a-zA-Z0-9_]+)', 'Master::simpandata/$1');

});

// Routing Modul Finance
$routes->group('finance', static function ($routes) {
    $routes->post('datagrid/([a-zA-Z0-9_]+)', 'Finance::get_data_grid/$1');
    $routes->get('grid/([a-zA-Z0-9_]+)', 'Finance::get_grid/$1');
    $routes->post('form/([a-zA-Z0-9_]+)', 'Finance::get_form/$1');
    $routes->post('display/([a-zA-Z0-9_]+)', 'Finance::getdisplay/$1');
    $routes->post('simpan/([a-zA-Z0-9_]+)', 'Finance::simpandata/$1');

});

// Routing Modul HRD
$routes->group('hrd', static function ($routes) {
    $routes->post('datagrid/([a-zA-Z0-9_]+)', 'Hrd::get_data_grid/$1');
    $routes->get('grid/([a-zA-Z0-9_]+)', 'Hrd::get_grid/$1');
    $routes->post('form/([a-zA-Z0-9_]+)', 'Hrd::get_form/$1');
    $routes->post('display/([a-zA-Z0-9_]+)', 'Hrd::getdisplay/$1');
    $routes->post('simpan/([a-zA-Z0-9_]+)', 'Hrd::simpandata/$1');

});

//$routes->get('/login-user', 'Login::process');

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
