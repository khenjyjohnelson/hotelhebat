<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'home';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = 'welcome/no_page';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'welcome';
$route['no_level'] = 'welcome/no_level';
$route['dashboard'] = 'welcome/dashboard';

// Define routes dynamically based on JSON data
$jsonData2 = file_get_contents(FCPATH . ('assets/json/school_ukk_hotel_tables.postman_environment.json'));
$myData2 = json_decode($jsonData2, true)['values'];


foreach ($myData2 as $item2) {
    $prefix = 'c_' . $item2['key'];
    $cachedControllers = [];

    $routeKey = $item2['value'];
    $controller = $prefix;

    if (!isset($cachedControllers[$routeKey])) {
        $cachedControllers[$routeKey] = class_exists($routeKey);
    }

    if (!$cachedControllers[$routeKey]) {
        $route[$routeKey] = $controller;
    } else {
    }
        
    // Define routes for different functionality groups

    // View routes
    $viewRoutes = [
        'index' => 'index',
        'daftar' => 'daftar',
        'admin' => 'admin',
        'laporan' => 'laporan',
        'konfirmasi' => 'konfirmasi',
        'profil' => 'profil'
    ];

    // Common function routes
    $commonFunctionRoutes = [
        'tambah' => 'tambah',
        'update' => 'update',
        'filter' => 'filter'
    ];

    $uncommonFunctionRoutes = [
        'detail' => 'detail',
        'hapus' => 'hapus',
        'print' => 'print',
    ];

    // Unique function routes
    $uniqueFunctionRoutes = [
        'login' => 'login',
        'signup' => 'signup',
        'logout' => 'logout',
        'update_profil' => 'update_profil',
        'update_pass' => 'update_password',
        'ceklogin' => 'ceklogin',
        'importExcel' => 'importExcel',
        'cari' => 'cari',
        'book' => 'book'
    ];

    $uniqueFieldRoutes = [
        'tabel7_field6' => 'tabel7_field6',
        'tabel7_field7' => 'tabel7_field7',
        'tabel7_field8' => 'tabel7_field8',
        'tabel25_field3' => 'tabel7_field3',
        'tabel25_field4' => 'tabel7_field4',
        'tabel25_field5' => 'tabel7_field5',
    ];

    // Assign routes for each group
    // Check if any view routes don't exist

    foreach ($viewRoutes as $key => $value) {
        $routeKey1 = $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;

        if (!isset($cachedControllers[$routeKey1])) {
            $cachedControllers[$routeKey1] = class_exists($routeKey1);
        }

        if (!$cachedControllers[$routeKey1]) {
            $route[$routeKey1] = $controller1;
        } else {
            $route[$routeKey1] = 'welcome/no_page';
        }
    }

    foreach ($commonFunctionRoutes as $key => $value) {
        $routeKey1 = $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;

        if (!isset($cachedControllers[$routeKey1])) {
            $cachedControllers[$routeKey1] = class_exists($routeKey1);
        }

        if (!$cachedControllers[$routeKey1]) {
            $route[$routeKey1] = $controller1;
        } else {
            $route[$routeKey1] = 'welcome/no_page';
        }

        foreach ($uniqueFieldRoutes as $key2 => $fields) {
            $routeKey2 = $item2['value'] . '/' . $value . '_' . $key2;
            $controller2 = $prefix . '/' . $value . '_' . $fields;

            if (!isset($cachedControllers[$routeKey2])) {
                $cachedControllers[$routeKey2] = class_exists($routeKey2);
            }

            if ($cachedControllers[$routeKey2]) {
                $route[$routeKey2] = $controller2;
            } else {
            }
        }
    }

    foreach ($uncommonFunctionRoutes as $key => $value) {
        $routeKey1 = $item2['value'] . '/' . $key . '/(:num)';
        $controller1 = $prefix . '/' . $value . '/$1';

        if (!isset($cachedControllers[$routeKey1])) {
            $cachedControllers[$routeKey1] = class_exists($routeKey1);
        }

        if (!$cachedControllers[$routeKey1]) {
            $route[$routeKey1] = $controller1;
        } else {
            $route[$routeKey1] = 'welcome/no_page';
        }
    }

    foreach ($uniqueFunctionRoutes as $key => $value) {
        $routeKey1 = $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;

        if (!isset($cachedControllers[$routeKey1])) {
            $cachedControllers[$routeKey1] = class_exists($routeKey1);
        }

        if (!$cachedControllers[$routeKey1]) {
            $route[$routeKey1] = $controller1;
        } else {
            $route[$routeKey1] = 'welcome/no_page';
        }
    }
}