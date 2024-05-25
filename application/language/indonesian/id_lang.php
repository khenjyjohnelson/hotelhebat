<?php
defined('BASEPATH') or exit('No direct script access allowed');

$lang['no'] = 'No';
$lang['action'] = "Aksi";
$lang['add'] = "Tambah";
$lang['print_report'] = "Cetak Laporan";
$lang['save_data'] = "Simpan";
$lang['update_data'] = "Simpan Perubahan";
$lang['close_dialog'] = "Tutup";

$lang['new_notifications'] = "Notifikasi Baru";
$lang['show_all_notifications'] = "Tampilkan semua notifikasi";
$lang['no_notifications_available'] = "Tidak Ada Notifikasi Tersedia";

$lang['home'] = "Beranda";
$lang['login'] = "Masuk";
$lang['signup'] = "Daftar";
$lang['dashboard'] = "Dasbor";
$lang['logout'] = "Keluar";
$lang['operational'] = "Operasional";
$lang['back_to_home'] = "Kembali ke Beranda";
$lang['create_account'] = "Buat Akun";
$lang['sign_in'] = "Masuk";
$lang['create_an_account'] = "Buat Akun";
$lang['detail'] = "Detail";
$lang['statistics'] = "Statistik";
$lang['master_data'] = "Data Master";
$lang['data'] = "Data";
$lang['manage'] = "Kelola";

$lang['explore'] = 'Jelajahi';
$lang['address'] = 'Alamat';
$lang['follow'] = 'Ikuti';

$lang['no_access'] = "Anda tidak memiliki akses ke halaman ini!";
$lang['page_not_found'] = "Halaman Tidak Ada!";
$lang['welcome'] = "Selamat Datang!";
$lang['select'] = "Pilih";
$lang['required_to_do'] = " diperlukan untuk melakukan ";
$lang['and'] = "dan";

$lang['images_not_change_immediately'] = "Beberapa gambar tidak akan langsung berubah, perlu menghapus cache terlebih dahulu.";
$lang['reupload_image_even_for_name_change'] = "* Meski ingin mengubah nama saja, tetap harus mengupload ulang gambar juga.";

$jsonData1 = file_get_contents(site_url('assets/json/school_ukk_hotel_id.postman_environment.json'));
$myData1 = json_decode($jsonData1, true)['values'];

// Create variables dynamically
foreach ($myData1 as $item) {
    // List of placeholders
    $lang[$item['key']] = $item['value'];
    $lang[$item['key'] . '_input'] = 'Masukkan ' . $item['value'];
    $lang[$item['key'] . '_old'] = 'Masukkan ' . $item['value'] . ' lama';
    $lang[$item['key'] . '_new'] = 'Masukkan ' . $item['value'] . ' baru';
    $lang[$item['key'] . '_confirm'] = 'Masukkan konfirmasi ' . $item['value'];
    $lang[$item['key'] . '_btn'] = $item['value'];
    $lang[$item['key'] . '_select'] = "Pilih " . $item['value'];

    // List of titles
    $lang[$item['key'] . '_v1_title'] = $item['value'];
    $lang[$item['key'] . '_v2_title'] = 'Daftar ' . $item['value'];
    $lang[$item['key'] . '_v3_title'] = 'Data ' . $item['value'];
    $lang[$item['key'] . '_v4_title'] = 'Laporan ' . $item['value'];
    $lang[$item['key'] . '_v5_title'] = 'Data ' . $item['value'];
    $lang[$item['key'] . '_v6_title'] = 'Profil ' . $item['value'];
    $lang[$item['key'] . '_v7_title'] = $item['value'] . ' Berhasil!';
    $lang[$item['key'] . '_v8_title'] = 'Detail ' . $item['value'];

    // List of messages
    $lang[$item['key'] . '_v1_msg'] = $item['value'];
    $lang[$item['key'] . '_v2_msg'] = $item['value'];
    $lang[$item['key'] . '_v3_msg'] = $item['value'];
    $lang[$item['key'] . '_v4_msg'] = $item['value'];
    $lang[$item['key'] . '_v5_msg'] = 'Kirim bukti ini ke ' . $item['value'] . ' untuk diproses.';
    $lang[$item['key'] . '_v6_msg'] = $item['value'];
    $lang[$item['key'] . '_v7_msg'] = $item['value'];
    $lang[$item['key'] . '_v8_msg'] = $item['value'] . ' tidak tersedia.';

}