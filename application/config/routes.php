<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Redirect to English version if language is not specified
$route['default_controller'] = 'welcome/default_language';

$route['404_override'] = 'welcome/no_page';
$route['translate_uri_dashes'] = FALSE;

// Language routes
$route['^(?!en|fr|id|zh)(.*)/home$'] = 'welcome/default_language';
$route['(en|fr|id|zh)/home'] = 'welcome';
$route['(en|fr|id|zh)/dashboard'] = 'welcome/dashboard';
$route['(en|fr|id|zh)/dashboard/home'] = 'welcome/dashboard';
$route['(en|fr|id|zh)/welcome/set_language'] = 'welcome/set_language';
$route['(en|fr|id|zh)'] = 'welcome';

// Define routes dynamically based on JSON data
$jsonData2 = file_get_contents(FCPATH . ('assets/json/school_ukk_hotel.postman_environment.json'));
$myData2 = json_decode($jsonData2, true)['values'];

foreach ($myData2 as $item2) {
    $route['assets/img/' . $item2['value'] . '/(:any)'] = 'Omnitags/serve_image/' . $item2['key'] . '/$1';

    $prefix = 'c_' . $item2['key'];
    $cachedControllers = [];

    $routeKey = '(en|fr|id|zh)/' . $item2['value'];
    $controller = $prefix;

    if (!isset($cachedControllers[$routeKey])) {
        $cachedControllers[$routeKey] = class_exists($routeKey);
    }

    if (!$cachedControllers[$routeKey]) {
        $route[$routeKey] = $controller;
    } else {
        $route[$routeKey] = $routeKey;
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
        'aktifkan' => 'aktifkan',
        'nonaktifkan' => 'nonaktifkan',
        'detail' => 'detail',
        'lihat' => 'lihat',
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
        'daftar_history' => 'daftar_history',
        'update_id_event' => 'update_id_event',
        'update_id_lisensi' => 'update_id_lisensi',
        'update_id_tema' => 'update_id_tema',
        'update_favicon' => 'update_favicon',
        'update_logo' => 'update_logo',
        'update_foto' => 'update_foto',
        'ceklogin' => 'ceklogin',
        'importExcel' => 'importExcel',
        'cari' => 'cari',
        'book' => 'book'
    ];

    // Assign routes for each group
    // Check if any view routes don't exist

    foreach ($viewRoutes as $key => $value) {
        $routeKey1 = '(en|fr|id|zh)/' . $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;

        if (!isset($cachedControllers[$routeKey1])) {
            $cachedControllers[$routeKey1] = class_exists($routeKey1);
        }

        if (!$cachedControllers[$routeKey1]) {
            $route[$routeKey1] = $controller1;
        } else {
            $route[$routeKey1] = $item2['value'] . '/' . $key;
        }
    }

    foreach ($commonFunctionRoutes as $key => $value) {
        $routeKey1 = '(en|fr|id|zh)/' . $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;

        if (!isset($cachedControllers[$routeKey1])) {
            $cachedControllers[$routeKey1] = class_exists($routeKey1);
        }

        if (!$cachedControllers[$routeKey1]) {
            $route[$routeKey1] = $controller1;
        } else {
            $route[$routeKey1] = $item2['value'] . '/' . $key;
        }
    }

    foreach ($uncommonFunctionRoutes as $key => $value) {
        $routeKey1 = '(en|fr|id|zh)/' . $item2['value'] . '/' . $key . '/(:num)';
        $controller1 = $prefix . '/' . $value . '/$1';

        if (!isset($cachedControllers[$routeKey1])) {
            $cachedControllers[$routeKey1] = class_exists($routeKey1);
        }

        if (!$cachedControllers[$routeKey1]) {
            $route[$routeKey1] = $controller1;
        } else {
            $route[$routeKey1] = $item2['value'] . '/' . $key . '/$1';
        }
    }

    foreach ($uniqueFunctionRoutes as $key => $value) {
        $routeKey1 = '(en|fr|id|zh)/' .  $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;

        if (!isset($cachedControllers[$routeKey1])) {
            $cachedControllers[$routeKey1] = class_exists($routeKey1);
        }

        if (!$cachedControllers[$routeKey1]) {
            $route[$routeKey1] = $controller1;
        } else {
            $route[$routeKey1] = $item2['value'] . '/' . $key;
        }
    }
}
