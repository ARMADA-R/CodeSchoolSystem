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
$routes->get('/admin/info', 'AdminView::info');
$routes->get('/admin/slider', 'AdminView::slider');
$routes->get('/admin/filter', 'AdminView::filter');

$routes->get('/admin/ticket', 'AdminView::ticket');
$routes->get('/admin/parent', 'AdminView::parent');
$routes->get('/admin/partner', 'AdminView::partner');
$routes->get('/admin/schooledit', 'AdminView::schooledit');
$routes->get('/admin/adminemail', 'AdminView::adminemail');
$routes->get('/admin/user', 'AdminView::user');
$routes->get('/admin/mangeschool', 'AdminView::mangeschool');
$routes->get('/admin/callus', 'AdminView::callus');
$routes->get('/admin/gets', 'AdminView::gets');
$routes->get('/admin/viewticket', 'AdminView::viewticket');
$routes->get('/admin/problem', 'AdminView::problem');









// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

$routes->get('/school', 'SchoolView::home');
$routes->get('/school/messageForms/global', 'SchoolView::messageForms');
$routes->get('/school/exams/tables', 'SchoolView::examsTables');
$routes->get('/school/global/table', 'SchoolView::globalTable');
$routes->get('/school/gates/link', 'SchoolView::linkGates');
$routes->get('school/students/info', 'SchoolView::studentsInfo');
$routes->get('school/teachers/info', 'SchoolView::teachersInfo');
$routes->get('school/employees/info', 'SchoolView::employeesInfo');
$routes->get('school/subjects/info', 'SchoolView::subjectsInfo');
$routes->get('school/notifications/absence-tardiness', 'SchoolView::absenceAndTardiness');
$routes->get('school/notifications/public-messages', 'SchoolView::publicMesssages');
$routes->get('school/archive/absence-tardiness', 'SchoolView::absenceAndTardinessArchive');
$routes->get('school/archive/public-messages', 'SchoolView::publicMesssagesArchive');
$routes->get('school/parents-responce/responce-archive', 'SchoolView::parentsResponceArchive');
$routes->get('school/support/technical/tickets/sys-managers', 'SchoolView::systemManagersTichnicalSupportTickets');
$routes->get('school/support/technical/tickets/parents', 'SchoolView::parentsTichnicalSupportTickets');
$routes->get('school/support/technical/ticket/(:num)', 'SchoolView::viewTicket/$1');
$routes->get('school/services/questionnaires', 'SchoolView::questionnaires');
$routes->get('school/services/questionnaires/add', 'SchoolView::addQuestionnaires');
$routes->get('school/services/forms', 'SchoolView::forms');
$routes->get('school/partners/offers', 'SchoolView::partnersOffers');
$routes->get('school/partners/support', 'SchoolView::partnersSupport');
$routes->get('school/partner/support/technical/ticket/(:num)', 'SchoolView::viewPartnerTicket/$1');





// parents routes

$routes->get('/parent', 'ParentsView::home');

$routes->get('/parent/school/exams/tables', 'ParentsView::examsTables');
$routes->get('/parent/school/global/table', 'ParentsView::globalTable');
$routes->get('parent/school/questionnaires', 'ParentsView::questionnaires');
$routes->get('parent/school/forms', 'ParentsView::forms');
$routes->get('parent/school/notification', 'ParentsView::schoolNotifications');

$routes->get('parent/support/technical/sys-managers/messaging', 'ParentsView::messagingSystemManagers');
$routes->get('parent/support/technical/school-management/messaging', 'ParentsView::messagingSchoolManagement');
$routes->get('parent/support/technical/ticket/(:num)', 'ParentsView::viewTicket/$1');

$routes->get('parent/partners/offers', 'ParentsView::partnersOffers');
$routes->get('parent/partners/support', 'ParentsView::partnersSupport');
$routes->get('parent/partner/support/technical/ticket/(:num)', 'ParentsView::viewPartnerTicket/$1');

// $routes->get('/parent/gates/link', 'ParentsView::linkGates');
// $routes->get('parent/students/info', 'ParentsView::studentsInfo');
// $routes->get('parent/teachers/info', 'ParentsView::teachersInfo');
// $routes->get('parent/employees/info', 'ParentsView::employeesInfo');
// $routes->get('parent/subjects/info', 'ParentsView::subjectsInfo');
// $routes->get('parent/notifications/absence-tardiness', 'ParentsView::absenceAndTardiness');
// $routes->get('parent/notifications/public-messages', 'ParentsView::publicMesssages');
// $routes->get('parent/archive/absence-tardiness', 'ParentsView::absenceAndTardinessArchive');
// $routes->get('parent/archive/public-messages', 'ParentsView::publicMesssagesArchive');
// $routes->get('parent/parents-responce/responce-archive', 'ParentsView::parentsResponceArchive');
// $routes->get('parent/support/technical/tickets/parents', 'ParentsView::parentsTichnicalSupportTickets');
// $routes->get('parent/support/technical/ticket/(:num)', 'ParentsView::viewTicket/$1');
// $routes->get('parent/services/questionnaires/add', 'ParentsView::addQuestionnaires');




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
