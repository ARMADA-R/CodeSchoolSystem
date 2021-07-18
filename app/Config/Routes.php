<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Yousef Route
$routes->get('/admin', 'AdminView::home');












// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

$routes->get('/school', 'SchoolView::home');
$routes->get('/school/messageForms/global', 'SchoolView::messageForms');
$routes->get('/school/exams/tables', 'SchoolView::examsTables');
$routes->get('/school/global/table', 'SchoolView::globalTable');
$routes->get('/school/course/add', 'SchoolView::addCourse');
$routes->get('school/students/info', 'SchoolView::studentsInfo');
$routes->get('school/teachers/info', 'SchoolView::teachersInfo');
$routes->get('school/employees/info', 'SchoolView::employeesInfo');
$routes->get('school/subjects/info', 'SchoolView::subjectsInfo');
$routes->get('school/notifications/absence-tardiness', 'SchoolView::absenceAndTardiness');


/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
