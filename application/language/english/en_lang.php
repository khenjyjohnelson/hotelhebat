<?php
defined('BASEPATH') or exit('No direct script access allowed');

$lang['no'] = 'No';
$lang['action'] = 'Action';
$lang['add'] = 'Add';
$lang['print_report'] = 'Print Report';
$lang['save_data'] = 'Save';
$lang['update_data'] = 'Save Changes';
$lang['close_dialog'] = 'Close';

$jsonData1 = file_get_contents(site_url('assets/json/school_ukk_hotel.postman_environment.json'));
$myData1 = json_decode($jsonData1, true)['values'];

// Create variables dynamically
foreach ($myData1 as $item) {
    $lang[$item['key']] = $item['value'];
    $lang[$item['key'] . '_input'] = 'Input ' . $item['value'];
    $lang[$item['key'] . '_btn'] = $item['value'];

}

// Define routes dynamically based on JSON data
$jsonData2 = file_get_contents(FCPATH . ('assets/json/school_ukk_hotel_tables.postman_environment.json'));
$myData2 = json_decode($jsonData2, true)['values'];


foreach ($myData2 as $item) {


    $lang[$item['key'] . '_v1_title'] = $item['value']; // Assuming $item['value'] is already in English
    $lang[$item['key'] . '_v2_title'] = 'List of ' . $item['value']; // "Daftar" -> "List of"
    $lang[$item['key'] . '_v3_title'] = 'Data ' . $item['value']; // "Data" remains "Data"
    $lang[$item['key'] . '_v4_title'] = 'Report ' . $item['value']; // "Laporan" -> "Report"
    $lang[$item['key'] . '_v5_title'] = 'Data ' . $item['value']; // "Data" remains "Data"
    $lang[$item['key'] . '_v6_title'] = 'Profile ' . $item['value']; // "Profil" -> "Profile"
    $lang[$item['key'] . '_v7_title'] = $item['value'] . ' Successful!'; // "Berhasil!" -> "Successful!"
    $lang[$item['key'] . '_v8_title'] = 'Details of ' . $item['value']; // "Detail" -> "Details of"


}