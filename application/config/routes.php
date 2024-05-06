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

    $route[$item2['value']] = $prefix;

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
        'tambah',
        'update',
        'filter'
    ];

    $uncommonFunctionRoutes = [
        'detail',
        'hapus',
        'print',
    ];

    // Unique function routes
    $uniqueFunctionRoutes = [
        'login',
        'signup',
        'logout',
        'update_profil',
        'update_password',
        'ceklogin',
        'importExcel',
        'cari',
        'book'
    ];

    $uniqueTableRoutes = [
        'filter_'
    ];

    $uniqueFieldRoutes = [
        'tabel7_field6',
        'tabel7_field7',
        'tabel7_field8',
        'tabel25_field3',
        'tabel25_field4',
        'tabel25_field5',
    ];

    // Assign routes for each group
    foreach ($viewRoutes as $key => $value) {
        $route[$item2['value'] . '/' . $key] = $prefix . '/' . $value;
    }

    foreach ($commonFunctionRoutes as $value) {
        $route[$item2['value'] . '/' . $value] = $prefix . '/' . $value;
        foreach ($uniqueFieldRoutes as $fields) {
            $route[$item2['value'] . '/' . $value . '_' . $fields] = $prefix . '/' . $value . '_' . $fields;
        }
    }

    foreach ($uncommonFunctionRoutes as $value) {
        $route[$item2['value'] . '/' . $value . '/(:num)'] = $prefix . '/' . $value . '/$1';
    }

    foreach ($uniqueFunctionRoutes as $value) {
        $route[$item2['value'] . '/' . $value] = $prefix . '/' . $value;
    }

    foreach ($uniqueTableRoutes as $value) {
        $route[$item2['value'] . '/filter_' . $value] = $prefix . '/' . 'filter_' . $item2['value'];
    }
}