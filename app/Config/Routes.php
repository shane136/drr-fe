<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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


// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('home', 'Home::index');
$routes->get('login', 'Home::login');
$routes->post('signIn', 'Home::signIn');
$routes->get('register', 'Home::register');
$routes->get('logout', 'Home::logout');
$routes->post('account', 'Home::account');
$routes->get('notification', 'Home::notification');



$routes->get('CityOfficials', 'Home::city');
$routes->get('BrgyOfficials', 'Home::brgy');
$routes->get('govt', 'Home::govt');
$routes->get('admin', 'Home::admin');
$routes->get('commcen', 'Home::commcen');
$routes->get('logistics', 'Home::logistics');
$routes->get('ops', 'Home::ops');
$routes->get('training', 'Home::training');
$routes->get('offices', 'Home::offices');
$routes->post('add_official', 'Home::add_official');
$routes->post('add_brgy', 'Home::add_brgy');
$routes->post('add_admin', 'Home::add_admin');
$routes->post('add_commcen', 'Home::add_commcen');
$routes->post('add_logistics', 'Home::add_logistics');
$routes->post('add_ops', 'Home::add_ops');
$routes->post('add_training', 'Home::add_training');
$routes->post('add_govt', 'Home::add_govt');
$routes->post('add_office', 'Home::add_office'); //govt
$routes->post('add_offices', 'Home::add_offices');
$routes->post('batch_add_official', 'Home::batch_add_official');
$routes->post('batch_add_brgy', 'Home::batch_add_brgy');
$routes->post('batch_add_office', 'Home::batch_add_office'); //govt
$routes->post('batch_add_offices', 'Home::batch_add_offices');
$routes->post('batch_add_admin', 'Home::batch_add_admin');
$routes->post('batch_add_commcen', 'Home::batch_add_commcen');
$routes->post('batch_add_logs', 'Home::batch_add_logs');
$routes->post('batch_add_ops', 'Home::batch_add_ops');
$routes->post('batch_add_training', 'Home::batch_add_training');
$routes->get('delete_official/(:num)', 'Home::delete_official/$1');
$routes->get('delete_brgy/(:num)', 'Home::delete_brgy/$1');
$routes->get('delete_office/(:num)', 'Home::delete_office/$1'); //govt
$routes->get('delete_offices/(:num)', 'Home::delete_offices/$1');
$routes->get('delete_admin/(:num)', 'Home::delete_admin/$1');
$routes->get('delete_commcen/(:num)', 'Home::delete_commcen/$1');
$routes->get('delete_logistics/(:num)', 'Home::delete_logistics/$1');
$routes->get('delete_ops/(:num)', 'Home::delete_ops/$1');
$routes->get('delete_training/(:num)', 'Home::delete_training/$1');
$routes->post('update_brgy/(:num)', 'Home::update_brgy/$1');
$routes->post('update_official/(:num)', 'Home::update_official/$1');
$routes->post('update_office/(:num)', 'Home::update_office/$1'); //govt
$routes->post('update_offices/(:num)', 'Home::update_offices/$1');
$routes->post('update_admin/(:num)', 'Home::update_admin/$1');
$routes->post('update_commcen/(:num)', 'Home::update_commcen/$1');
$routes->post('update_logistics/(:num)', 'Home::update_logistics/$1');
$routes->post('update_ops/(:num)', 'Home::update_ops/$1');
$routes->post('update_training/(:num)', 'Home::update_training/$1');



$routes->get('user_home', 'User::user_home');
$routes->get('cityOfficials', 'User::cityOfficials');
$routes->get('brgyOfficials', 'User::brgyOfficials');
$routes->get('government', 'User::government');
$routes->get('Admin', 'User::Admin');
$routes->get('Commcen', 'User::Commcen');
$routes->get('Logistics', 'User::Logistics');
$routes->get('Operations', 'User::Operations');
$routes->get('Training', 'User::Training');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
