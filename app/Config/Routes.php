<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.


/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('Core\Home\Controllers');
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

$session = session();
$checkadmin = $session->get('isAdmin');


$routes->get('/', 'Home::index');
$routes->set404Override('\Core\Home\Controllers\Home::show404');
$routes->get('login', 'Home::login');
$routes->post('login', 'Home::submitlogin');
$routes->get('register', 'Home::register');
$routes->post('register', 'Home::submitregister');
$routes->get('forgot', 'Home::forgot');
$routes->post('forgot', 'Home::submitforgot');
$routes->get('otp', 'Home::otp');
$routes->post('otp', 'Home::check_code');
$routes->get('reset', 'Home::reset');
$routes->post('reset', 'Home::new_password');
$routes->get('logout', 'Home::logout');
$routes->post('singleuploader', 'Home::singleuploader');
$routes->post('multiuploader', 'Home::multiuploader');

$routes->group('', ['namespace' => 'Core\Auth\Controllers'], static function ($routes) {
    $routes->get('login/(:any)', 'Auth::social_login/$1');
    $routes->post('timezone', 'Auth::timezone');
});
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

/**
 * --------------------------------------------------------------------
 * Include Modules Routes Files
 * --------------------------------------------------------------------
 */


if($checkadmin == 1 || $checkadmin == 2) {
    if (file_exists(ROOTPATH.'inc/core')) {
        $modulesPath = ROOTPATH.'inc/core/';
        $modules = scandir($modulesPath);

        foreach ($modules as $module) {
            if ($module === '.' || $module === '..') continue;
            if (is_dir($modulesPath) . '/' . $module) {
                $routesPath = $modulesPath . $module . '/Config/Routes.php';
                if (file_exists($routesPath)) {
                    require($routesPath);
                } else {
                    continue;
                }
            }
        }
    }
}

if($checkadmin == 3) {
    if (file_exists(ROOTPATH.'inc/superadmin')) {
        $modulesPath = ROOTPATH.'inc/superadmin/';
        $modules = scandir($modulesPath);

        foreach ($modules as $module) {
            if ($module === '.' || $module === '..') continue;
            if (is_dir($modulesPath) . '/' . $module) {
                $routesPath = $modulesPath . $module . '/Config/Routes.php';
                if (file_exists($routesPath)) {
                    require($routesPath);
                } else {
                    continue;
                }
            }
        }
    }
}

if (file_exists(ROOTPATH.'inc/setup')) {
    $modulesPath = ROOTPATH.'inc/setup/';
    $modules = scandir($modulesPath);

    foreach ($modules as $module) {
        if ($module === '.' || $module === '..') continue;
        if (is_dir($modulesPath) . '/' . $module) {
            $routesPath = $modulesPath . $module . '/Config/Routes.php';
            if (file_exists($routesPath)) {
                require($routesPath);
            } else {
                continue;
            }
        }
    }
}

if (file_exists(ROOTPATH.'inc/themes/backend')) {
    $modulesPath = ROOTPATH.'inc/themes/backend/';
    $modules = scandir($modulesPath);

    foreach ($modules as $module) {
        if ($module === '.' || $module === '..') continue;
        if (is_dir($modulesPath) . '/' . $module) {
            $routesPath = $modulesPath . $module . '/Config/Routes.php';
            if (file_exists($routesPath)) {
                require($routesPath);
            } else {
                continue;
            }
        }
    }
}

if (file_exists(ROOTPATH.'inc/themes/frontend')) {
    $modulesPath = ROOTPATH.'inc/themes/frontend/';
    $modules = scandir($modulesPath);

    foreach ($modules as $module) {
        if ($module === '.' || $module === '..') continue;
        if (is_dir($modulesPath) . '/' . $module) {
            $routesPath = $modulesPath . $module . '/Config/Routes.php';
            if (file_exists($routesPath)) {
                require($routesPath);
            } else {
                continue;
            }
        }
    }
}

if ( file_exists( realpath(  __DIR__."/../Helpers" ) ) ) {
    $helperPath = realpath(  __DIR__."/../Helpers/" )."/";
    $helpers = scandir($helperPath);
    foreach ($helpers as $helper) {
        if ($helper === '.' || $helper === '..' || stripos( $helper , "_helper.php") === false) continue;
        if (  file_exists( $helperPath.$helper ) ) {
            require_once( $helperPath.$helper );
        }
    }
}