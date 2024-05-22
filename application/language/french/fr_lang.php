<?php
defined('BASEPATH') or exit('No direct script access allowed');

$lang['no'] = 'Numéro';
$lang['action'] = 'Action';
$lang['add'] = 'Ajouter';
$lang['print_report'] = 'Imprimer le rapport';
$lang['save_data'] = 'Enregistrer';
$lang['update_data'] = 'Enregistrer les modifications';
$lang['close_dialog'] = 'Fermer';

// Load the JSON data
$jsonData1 = file_get_contents(site_url('assets/json/school_ukk_hotel.postman_environment.json'));
$myData1 = json_decode($jsonData1, true)['values'];

// Create variables dynamically
foreach ($myData1 as $item) {
    $lang[$item['key']] = $item['value'];
    $lang[$item['key'] . '_input'] = 'Entrée ' . $item['value'];
    $lang[$item['key'] . '_btn'] = $item['value'];
}

// Load the second JSON data for route definitions
$jsonData2 = file_get_contents(FCPATH . 'assets/json/school_ukk_hotel_tables.postman_environment.json');
$myData2 = json_decode($jsonData2, true)['values'];

foreach ($myData2 as $item) {
    $lang[$item['key'] . '_v1_title'] = $item['value']; // Assuming $item['value'] is already translated
    $lang[$item['key'] . '_v2_title'] = 'Liste de ' . $item['value']; // "Daftar" -> "Liste de"
    $lang[$item['key'] . '_v3_title'] = 'Données de ' . $item['value']; // "Data" -> "Données de"
    $lang[$item['key'] . '_v4_title'] = 'Rapport de ' . $item['value']; // "Laporan" -> "Rapport de"
    $lang[$item['key'] . '_v5_title'] = 'Données de ' . $item['value']; // "Data" -> "Données de"
    $lang[$item['key'] . '_v6_title'] = 'Profil de ' . $item['value']; // "Profil" -> "Profil de"
    $lang[$item['key'] . '_v7_title'] = $item['value'] . ' réussi!'; // "Berhasil" -> "réussi!"
    $lang[$item['key'] . '_v8_title'] = 'Détails de ' . $item['value']; // "Detail" -> "Détails de"
}
