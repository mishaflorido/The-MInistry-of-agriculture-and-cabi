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
$routes->get('index.php/', 'Home::index');
$routes->post('index.php/login', 'Log_in_out::log_users');
$routes->post('index.php/index.php', 'Log_in_out::log_users');
$routes->post('index.php/logout', 'Log_in_out::log_out');

// User Controllers
$routes->post('/insert/user', 'UserController::insert_user');
$routes->post('/update/user', 'UserController::update_user');
$routes->post('/update/userInfo', 'UserController::update_userInfo');
$routes->get('/get/users', 'UserController::get_users');
$routes->post('/delete/user', 'UserController::delete_users');
// Farmer
$routes->get('/get/farmer', 'FarmerController::get_farmer');
$routes->post('/insert/farmer', 'FarmerController::insert_farmer');
// Plant Doctor
$routes->get('/get/plant_doctor', 'PlantDoctorController::get_plant_doctor');
$routes->post('/insert/pdoctor', 'PlantDoctorController::insert_plant_doctor');
$routes->post('/update/pdoctor', 'PlantDoctorController::update_plant_doctor');
$routes->post('/delete/pdoctor', 'PlantDoctorController::delete_plant_doctor');
// Parcel
$routes->post('/insert/parcel', 'FarmerController::insert_parcel');
// Other Involved
$routes->post('/insert/otherInvolved', 'FarmerController::insert_other_involved');
$routes->post('/get/otherinvolved', 'FarmerController::get_other_involved');
//County or New Parish
$routes->get('/get/county', 'FarmerController::get_county');
$routes->post('/insert/parish', 'FarmerController::insert_parish');
$routes->post('/update/parish', 'FarmerController::update_parish');
$routes->post('/delete/parish', 'FarmerController::delete_parish');
//Sub-County or New Village
$routes->get('/get/parish', 'FarmerController::get_parish');
$routes->post('/insert/village', 'FarmerController::insert_village');
$routes->post('/update/village', 'FarmerController::update_village');
$routes->post('/delete/village', 'FarmerController::delete_village');
//Village do nos exist, now its Complementary adrress
$routes->get('/get/district', 'FarmerController::get_district');
$routes->post('/insert/complementary', 'FarmerController::insert_complementary');
// Crop
$routes->get('/get/crop', 'CropController::get_crop');
$routes->post('/insert/crop_det', 'FarmerController::insert_crop_det');
$routes->post('/insert/crop', 'CropController::insert_crop');
$routes->post('/update/crop', 'CropController::update_crop');
$routes->post('/delete/crop', 'CropController::delete_crop');
// Livestock
$routes->get('/get/livestock', 'LivestockController::get_livestock');
$routes->post('/insert/live_det', 'FarmerController::insert_live_det');
// Middleman 
$routes->post('/insert/m_det', 'FarmerController::insert_middleman');
// Pesticide Application 
$routes->post('/insert/pest_app', 'PestAppController::insert_pest_app');
$routes->post('/update/pest_app', 'PestAppController::update_pest_app');
$routes->post('/delete/pest_app', 'PestAppController::delete_pest_app');
$routes->post('/get/pest_app_betweendate', 'PestAppController::get_pest_app_datebtw');
$routes->get('/get/pest_app', 'PestAppController::get_pest_app');
// Boundary 
$routes->post('/insert/boundary', 'FarmerController::insert_boundary');
// FarmRoads 
$routes->post('/insert/farmRoad', 'FarmRoadController::insert_farm_road');
$routes->post('/update/farmRoad', 'FarmRoadController::update_farm_road');
$routes->post('/delete/farmRoad', 'FarmRoadController::delete_farm_road');
$routes->get('/get/farmRoad', 'FarmRoadController::get_farm_road');
$routes->post('/get/farm_road_report', 'FarmRoadController::get_farm_road_report');
// Praedial
$routes->post('/insert/praedial', 'PraedialController::insert_praedial');
$routes->post('/update/praedial', 'PraedialController::update_praedial');
$routes->post('/insert/weekly_data_collector', 'PraedialController::insert_weekly_data_collection');
$routes->post('/update/weekly_data_collector', 'PraedialController::update_weekly_data_collection');
$routes->post('/delete/weekly_data_collector', 'PraedialController::delete_weekly_data_collection');
$routes->get('/get/weekly_data_collector', 'PraedialController::get_praedial');
$routes->post('/get/weekly_data', 'PraedialController::get_weekly_data');
$routes->get('/get/weekly_data_collectorCREST', 'PraedialController::get_CropEst_WDC');
//Crop Damage
$routes->post('/get/crop_damage_tb1', 'CropDamageController::get_cropd_tb1');
$routes->post('/get/crop_damage_tb2', 'CropDamageController::get_cropd_tb2');
$routes->get('/get/crop_damage', 'CropDamageController::get_crop_damage');
$routes->post('/insert/crop_damage', 'CropDamageController::insert_crop_damage');
$routes->post('/update/crop_damage', 'CropDamageController::update_crop_damage');
$routes->post('/delete/crop_damage', 'CropDamageController::delete_crop_damage');
$routes->post('/insert/crop_damage_tb1', 'CropDamageController::insert_crop_damage_tb1');
$routes->post('/update/crop_damage_tb1', 'CropDamageController::update_crop_damage_tb1');
$routes->post('/insert/crop_damage_tb2', 'CropDamageController::insert_crop_damage_tb2');
$routes->post('/update/crop_damage_tb2', 'CropDamageController::update_crop_damage_tb2');
// Plant Application
$routes->post('/insert/plant_application', 'PlantApplicationController::insert_plant_application');
$routes->post('/update/plant_application', 'PlantApplicationController::update_plant_application');
$routes->post('/delete/plant_application', 'PlantApplicationController::delete_plant_application');
$routes->post('/insert/plant_application_table', 'PlantApplicationController::insert_plant_application_table');
$routes->post('/update/plant_application_table', 'PlantApplicationController::update_plant_application_table');
$routes->post('/insert/pre_plant_insp', 'PlantApplicationController::insert_pre_plant_insp');
$routes->post('/update/pre_plant_insp', 'PlantApplicationController::update_pre_plant_insp');
$routes->post('/insert/post_plant_insp', 'PlantApplicationController::insert_post_plant_insp');
$routes->post('/update/post_plant_insp', 'PlantApplicationController::update_post_plant_insp');
$routes->post('/insert/future_development', 'PlantApplicationController::insert_future_development');
$routes->post('/update/future_development', 'PlantApplicationController::update_future_development');
$routes->get('/get/plant_app', 'PlantApplicationController::get_plant_application');
$routes->post('/get/plant_apply_tb1', 'PlantApplicationController::get_plant_application_tb1');
$routes->post('/get/plant_apply_tb2', 'PlantApplicationController::get_plant_application_tb2');
$routes->post('/get/plant_apply_tb3', 'PlantApplicationController::get_plant_application_tb3');
$routes->post('/get/plant_apply_tb4', 'PlantApplicationController::get_plant_application_tb4');
// Variety
$routes->get('/get/variety', 'CropController::get_variety');
$routes->post('/insert/variety', 'CropController::insert_variety');
$routes->post('/update/variety', 'CropController::update_variety');
$routes->post('/delete/variety', 'CropController::delete_variety');

// DCA Form
$routes->get('/get/dca', 'DCAFromController::get_dca');
$routes->post('/insert/dca_form', 'DCAFromController::insert_dca');
$routes->post('/update/dca_form', 'DCAFromController::update_dca');
$routes->post('/delete/dca_form', 'DCAFromController::delete_dca');
// Oficers Weekly Report
$routes->get('/get/oficer_wr', 'OficersWeeklyReportController::get_of_wr');
$routes->post('/insert/oficer_wr', 'OficersWeeklyReportController::insert_of_wr');
$routes->post('/update/oficer_wr', 'OficersWeeklyReportController::update_of_wr');
$routes->post('/delete/oficer_wr', 'OficersWeeklyReportController::delete_of_wr');
$routes->post('/insert/weekend_wr', 'OficersWeeklyReportController::insert_weeklyend_ofwr');
$routes->post('/update/weekend_wr', 'OficersWeeklyReportController::update_weeklyend_ofwr');
$routes->post('/insert/other_activ', 'OficersWeeklyReportController::insert_other_activ_ofwr');
$routes->post('/update/other_activ', 'OficersWeeklyReportController::update_other_activ_ofwr');
$routes->post('/insert/itinerary_week', 'OficersWeeklyReportController::insert_itinerary_week');
$routes->post('/update/itinerary_week', 'OficersWeeklyReportController::update_itinerary_week');
$routes->post('/get/endWeek', 'OficersWeeklyReportController::get_endWeek');
$routes->post('/get/otherActivities', 'OficersWeeklyReportController::get_otherActivities');
$routes->post('/get/weekBeginning', 'OficersWeeklyReportController::get_weekBeginning');




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
