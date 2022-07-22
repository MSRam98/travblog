<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Travblog::login',['filter'=>'noauth']);
$routes->get('/register', 'Travblog::register',['filter'=>'noauth']);
$routes->get('/login', 'Travblog::login',['filter'=>'noauth']);
$routes->get('/aboutus', 'Travblog::aboutus',['filter'=>'noauth']);
$routes->post('/createuser','Travblog::create_user',['filter'=>'noauth']);
$routes->post('/checkuser','Travblog::check_user',['filter'=>'noauth']);
$routes->get('/blogs','Travblog::blogs',['filter'=>'auth']);
$routes->get('/viewblog/(:num)','Travblog::viewblog/$1',['filter'=>'auth']);
$routes->get('/profile','Travblog::profile',['filter'=>'auth']);
$routes->get('/createblogpage','Travblog::createblogpage',['filter'=>'auth']);
$routes->post('/createblog','Travblog::createblog',['filter'=>'auth']);
$routes->get('/editblogpage/(:num)','Travblog::editblogpage/$1',['filter'=>'auth']);
$routes->post('/editblog','Travblog::editblog',['filter'=>'auth']);
$routes->get('/logout','Travblog::logout');


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
