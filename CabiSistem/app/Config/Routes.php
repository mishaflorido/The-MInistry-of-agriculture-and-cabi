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
// Plant Doctor
$routes->get('/get/plant_doctor', 'PlantDoctorController::get_plant_doctor');
// Parcel
$routes->post('/insert/parcel', 'FarmerController::insert_parcel');
// Other Involved
$routes->post('/insert/otherInvolved', 'FarmerController::insert_other_involved');
$routes->post('/get/otherinvolved', 'FarmerController::get_other_involved');
//County
$routes->get('/get/county', 'FarmerController::get_county');
//Sub-County
$routes->get('/get/parish', 'FarmerController::get_parish');
//Village
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
// FarmRoads 
$routes->post('/insert/farmRoad', 'FarmRoadController::insert_farm_road');
// Praedial
$routes->post('/insert/praedial', 'PraedialController::insert_praedial');
$routes->post('/insert/weekly_data_collector', 'PraedialController::insert_weekly_data_collection');
//Crop Damage
$routes->post('/insert/crop_damage', 'CropDamageController::insert_crop_damage');
$routes->post('/insert/crop_damage_tb1', 'CropDamageController::insert_crop_damage_tb1');
$routes->post('/insert/crop_damage_tb2', 'CropDamageController::insert_crop_damage_tb2');
// Plant Application
$routes->post('/insert/plant_application', 'PlantApplicationController::insert_plant_application');
$routes->post('/insert/plant_application_table', 'PlantApplicationController::insert_plant_application_table');
$routes->post('/insert/pre_plant_insp', 'PlantApplicationController::insert_pre_plant_insp');
$routes->post('/insert/post_plant_insp', 'PlantApplicationController::insert_post_plant_insp');
$routes->post('/insert/future_development', 'PlantApplicationController::insert_future_development');
// DCA Form
$routes->get('/get/variety', 'DCAFromController::get_variety');
$routes->post('/insert/dca_form', 'DCAFromController::insert_dca');




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
