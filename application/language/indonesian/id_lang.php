<?php
defined('BASEPATH') or exit('No direct script access allowed');

$lang['no'] = 'No';
$lang['action'] = 'Aksi';
$lang['add'] = 'Tambah';
$lang['print_report'] = 'Cetak Laporan';
$lang['save_data'] = 'Simpan';
$lang['update_data'] = 'Simpan Perubahan';
$lang['close_dialog'] = 'Tutup';

$jsonData1 = file_get_contents(site_url('assets/json/school_ukk_hotel.postman_environment.json'));
$myData1 = json_decode($jsonData1, true)['values'];

// Create variables dynamically
foreach ($myData1 as $item) {
    $lang[$item['key']] = $item['value'];
    $lang[$item['key'] . '_input'] = 'Masukkan ' . $item['value'];
    $lang[$item['key'] . '_btn'] = $item['value'];
}

// Define routes dynamically based on JSON data
$jsonData2 = file_get_contents(FCPATH . ('assets/json/school_ukk_hotel_tables.postman_environment.json'));
$myData2 = json_decode($jsonData2, true)['values'];


foreach ($myData2 as $item) {
    $lang[$item['key'] . '_v1_title'] = $item['value'];
    $lang[$item['key'] . '_v2_title'] = 'Daftar ' . $item['value'];
    $lang[$item['key'] . '_v3_title'] = 'Data ' . $item['value'];
    $lang[$item['key'] . '_v4_title'] = 'Laporan ' . $item['value'];
    $lang[$item['key'] . '_v5_title'] = 'Data ' . $item['value'];
    $lang[$item['key'] . '_v6_title'] = 'Profil ' . $item['value'];
    $lang[$item['key'] . '_v7_title'] = $item['value'] . ' Berhasil!';
    $lang[$item['key'] . '_v8_title'] = 'Detail ' . $item['value'];
}