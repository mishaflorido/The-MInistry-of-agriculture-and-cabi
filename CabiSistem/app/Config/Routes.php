<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->post('/login', 'Log_in_out::log_users');
$routes->post('/logout', 'Log_in_out::log_out');

// User Controllers
$routes->post('/insert/user', 'UserController::insert_user');
$routes->post('/update/user', 'UserController::update_user');
$routes->get('/get/users', 'UserController::get_users');
// Farmer
$routes->get('/get/farmer', 'FarmerController::get_farmer');
$routes->post('/insert/farmer', 'FarmerController::insert_farmer');
// Parcel
$routes->post('/insert/parcel', 'FarmerController::insert_parcel');
// Other Involved
$routes->post('/insert/otherInvolved', 'FarmerController::insert_other_involved');
$routes->post('/get/otherinvolved', 'FarmerController::get_other_involved');
//Parish
$routes->get('/get/parish', 'FarmerController::get_parish');
//District
$routes->get('/get/district', 'FarmerController::get_district');
// Crop
$routes->get('/get/crop', 'CropController::get_crop');
$routes->post('/insert/crop_det', 'FarmerController::insert_crop_det');
// Livestock
$routes->get('/get/livestock', 'LivestockController::get_livestock');
$routes->post('/insert/live_det', 'FarmerController::insert_live_det');
// Middleman 
$routes->post('/insert/m_det', 'FarmerController::insert_middleman');
// Boundary 
$routes->post('/insert/boundary', 'FarmerController::insert_boundary');



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
