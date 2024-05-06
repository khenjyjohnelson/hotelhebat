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

$jsonData1 = file_get_contents(FCPATH . ('assets/json/school_ukk_hotel.postman_environment.json'));
$myData1 = json_decode($jsonData1, true)['values'];

// Create variables dynamically
foreach ($myData1 as $item1) {
    $aliases[$item1['key']] = $item1['value']; // Variable variable to create dynamic variables
}

// Define routes dynamically based on JSON data
$jsonData2 = file_get_contents(FCPATH . ('assets/json/school_ukk_hotel_tables.postman_environment.json'));
$myData2 = json_decode($jsonData2, true)['values'];

foreach ($myData2 as $item) {
    $prefix = 'c_' . $item['key'] . '/';

    // Routes tampilan
    $views = [
        'index' => 'index',
        'daftar' => 'daftar',
        'admin' => 'admin',
        'laporan' => 'laporan',
        'print' => 'print',
        'konfirmasi' => 'konfirmasi',
        'detail' => 'detail',
    ];

    $route[$item['value']] = 'c_' . $item['key'];

    foreach ($views as $key => $value) {
        $route[$item['value'] . '/' . $key] = $prefix . $value;
    }

    // Routes fungsi umum
    $common_functions = [
        'tambah',
        'update',
        'hapus',
        'filter'
    ];

    foreach ($common_functions as $value) {
        $route[$item['value'] . '/' . $value] = $prefix . $value;
    }

    // Routes fungsi unik
    $unique_functions = [
        'login',
        'logout',
        'update_profil',
        'update_password',
        'ceklogin',
        'importExcel',
        'cari',
        'book'
    ];

    foreach ($unique_functions as $value) {
        $route[$item['value'] . '/' . $value] = $prefix . $value;
    }

    // Routes unik tabel
    $route[$item['value'] . '/filter_' . $aliases['tabel4']] = $prefix . 'filter_tabel4';

    // Routes unik field
    $unique_fields = [
        $aliases['tabel4_field4'],
        $aliases['tabel7_field3'],
        $aliases['tabel7_field4'],
        $aliases['tabel7_field5'],
        $aliases['tabel7_field10'],
        $aliases['tabel7_field11'],
        $aliases['tabel7_field13'],
        $aliases['tabel9_field4']
    ];

    foreach ($unique_fields as $value) {
        $route[$item['value'] . '/update_' . $value] = $prefix . 'update_' . $value;
    }
}
