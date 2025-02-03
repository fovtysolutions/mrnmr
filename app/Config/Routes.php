<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'HomeController::index');
    // Members Routes
    $routes->get('member', 'MemberController::index');
    $routes->get('addmember/(:any)', 'MemberController::addPage/$1');
    $routes->get('editmember/(:any)/(:any)', 'MemberController::editPage/$1/$2');
    $routes->post('deletemember', 'MemberController::deletedetails');
    $routes->post('setmember', 'MemberController::dataInsert');
    $routes->post('setupdatemember', 'MemberController::dataUpdate');
    $routes->post('getmember', 'MemberController::getalldetails');

    // My Mr Perfect Routes
    $routes->get('mrperfect', 'MrPerfectController::index');
    $routes->get('addmrperfect/(:any)', 'MrPerfectController::addPage/$1');
    $routes->get('editmrperfect/(:any)/(:any)', 'MrPerfectController::editPage/$1/$2');
    $routes->post('deletemrperfect', 'MrPerfectController::deletedetails');
    $routes->post('setmrperfect', 'MrPerfectController::dataInsert');
    $routes->post('setupdatemrperfect', 'MrPerfectController::dataUpdate');
    $routes->post('getmrperfect', 'MrPerfectController::getalldetails');

    // Events Routes
    $routes->get('events', 'EventsController::index');
    $routes->get('addevents/(:any)', 'EventsController::addPage/$1');
    $routes->get('editevents/(:any)/(:any)', 'EventsController::editPage/$1/$2');
    $routes->post('deleteevents', 'EventsController::deletedetails');
    $routes->post('setevents', 'EventsController::dataInsert');
    $routes->post('setupdateevents', 'EventsController::dataUpdate');
    $routes->post('getevents', 'EventsController::getalldetails');

    //profile
    $routes->get('profile', 'ProfileController::index');
    $routes->get('profile/(:any)', 'ProfileController::editprofile/$1');
    $routes->post('updateprofile', 'ProfileController::update');
});


$routes->get('/getschools', 'SchoolController::getalldetails');
$routes->post('/setcertificate', 'HomeController::dataInsert');
$routes->get('/', 'HomeController::index');
//Auth Credentials
$routes->get('/login', 'AuthController::index');
$routes->get('/register', 'AuthController::register');
$routes->get('/forgotpassword', 'AuthController::forgotpassword');
$routes->get('/resetpassword', 'AuthController::resetpassword');
$routes->post('/registerpost', 'AuthController::registerpost');
$routes->post('/login', 'AuthController::login');
$routes->post('/forgotpasswordpost', 'AuthController::forgotpasswordpost');
$routes->post('/resetPasswordpost', 'AuthController::resetPasswordpost');
$routes->get('/logout', 'AuthController::logout');
$routes->post('fileorimageupload', 'FileorImageUploadController::index');