<?php
defined('BASEPATH') or exit('No direct script access allowed');

$lang['no'] = 'Numéro';
$lang['action'] = "Action";
$lang['add'] = "Ajouter";
$lang['print_report'] = "Imprimer le rapport";
$lang['save_data'] = "Enregistrer";
$lang['update_data'] = "Enregistrer les modifications";
$lang['close_dialog'] = "Fermer";

$lang['new_notifications'] = "Nouvelles notifications";
$lang['show_all_notifications'] = "Afficher toutes les notifications";
$lang['no_notifications_available'] = "Aucune notification disponible";

$lang['home'] = "Accueil";
$lang['login'] = "Connexion";
$lang['signup'] = "S'inscrire";
$lang['dashboard'] = "Tableau de bord";
$lang['logout'] = "Déconnexion";
$lang['operational'] = "Opérationnel";
$lang['back_to_home'] = "Retour à l'accueil";
$lang['create_account'] = "Créer un compte";
$lang['sign_in'] = "Se connecter";
$lang['create_an_account'] = "Créer un compte";
$lang['detail'] = "Détail";
$lang['statistics'] = "Statistiques";
$lang['master_data'] = "Données maîtresses";
$lang['data'] = "Données";
$lang['manage'] = "Gérer";

$lang['explore'] = 'Explorer';
$lang['address'] = 'Adresse';
$lang['follow'] = 'Suivre';

$lang['no_access'] = "Vous n'avez pas accès à cette page !";
$lang['page_not_found'] = "Page non trouvée !";
$lang['welcome'] = "Bienvenue !";
$lang['select'] = "Sélectionner";
$lang['required_to_do'] = " requis pour faire ";
$lang['and'] = "et";

$lang['images_not_change_immediately'] = "Certaines images ne changeront pas immédiatement, il est nécessaire de vider le cache d'abord.";
$lang['reupload_image_even_for_name_change'] = "* Même si vous souhaitez uniquement changer le nom, vous devez également télécharger à nouveau l'image.";

// Load the JSON data
$jsonData1 = file_get_contents(site_url('assets/json/school_ukk_hotel_fr.postman_environment.json'));
$myData1 = json_decode($jsonData1, true)['values'];

// Create variables dynamically
foreach ($myData1 as $item) {
    $lang[$item['key']] = $item['value'];
    $lang[$item['key'] . '_input'] = 'Entrée ' . $item['value'];
    $lang[$item['key'] . '_btn'] = $item['value'];

    $lang[$item['key'] . '_v1_title'] = $item['value']; // Assuming $item['value'] is already translated
    $lang[$item['key'] . '_v2_title'] = 'Liste de ' . $item['value']; // "Daftar" -> "Liste de"
    $lang[$item['key'] . '_v3_title'] = 'Données de ' . $item['value']; // "Data" -> "Données de"
    $lang[$item['key'] . '_v4_title'] = 'Rapport de ' . $item['value']; // "Laporan" -> "Rapport de"
    $lang[$item['key'] . '_v5_title'] = 'Données de ' . $item['value']; // "Data" -> "Données de"
    $lang[$item['key'] . '_v6_title'] = 'Profil de ' . $item['value']; // "Profil" -> "Profil de"
    $lang[$item['key'] . '_v7_title'] = $item['value'] . ' réussi!'; // "Berhasil" -> "réussi!"
    $lang[$item['key'] . '_v8_title'] = 'Détails de ' . $item['value']; // "Detail" -> "Détails de"
}