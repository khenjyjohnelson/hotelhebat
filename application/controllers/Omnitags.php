<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Omnitags extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Set security headers
        $this->output->set_header("Content-Security-Policy: default-src 'self' data:; script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; style-src 'self' https://cdnjs.cloudflare.com 'unsafe-inline';");
        $this->output->set_header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
        $this->output->set_header("X-Frame-Options: SAMEORIGIN");
        $this->output->set_header("X-Content-Type-Options: nosniff");
        $this->output->set_header("Referrer-Policy: strict-origin-when-cross-origin");
        $this->output->set_header("Permissions-Policy: geolocation=(self 'http://localhost/me/hotel')");
    }

    // Di bawah ini aku berencana untuk membuat sebuah array yang menampung semua jenis alias dari field dan nama tabel
    // Dan aku akan membuat array itu merge dengan array yang akan diload ke halaman view pada setiap
    // Controller yang ada di aplikasi ini, dengan begitu, aku tidak perlu khawatir jika ingin memulai projek baru
    // Dan ingin mengubah konten di dalamnya dalam waktu yang singkat

    // Aku ada rencana untuk menggunakan Toastr untuk menampilkan notifikasi toast
    // Ini adalah link : https://codeseven.github.io/toastr/demo.html

    public $head = '_partials/head';

    // Di bawah ini adalah fungsi config
    public $file_type1 = 'png|jpg|jpeg';
    public $file_type2 = 'pdf';

    // Di bawah ini adalah bagian part dari views
    public $v_part1 = 'title';
    public $v_part2 = 'head';
    public $v_part3 = 'konten';
    public $v_part4 = 'phase';
    public $v_part5 = 'dekor';
    public $v_part4_msg0 = '<br><span class="h6"> (phase pre-alpha feature)</span>';
    public $v_part4_msg1 = '<br><span class="h6"> (phase alpha feature)</span>';
    public $v_part4_msg2 = '<br><span class="h6"> (phase beta feature)</span>';
    public $v_part4_msg3 = '<br><span class="h6"> (release candidate feature)</span>';
    public $v_part4_msg4 = '';  // feature released

    public $aliases, $views, $flashdatas, $tempdatas;
    public $v1, $v2, $v3, $v4, $v5, $v6;
    public $v1_title, $v2_title, $v3_title, $v4_title, $v5_title, $v6_title;
    public $v_input, $v_post, $v_get, $v_old, $v_post_old;
    public $v_upload_path, $v_filter1, $v_filter1_get, $v_filter2, $v_filter2_get;
    public $flash, $flash_func;
    public $flash1_msg_1;
    public $flash1_msg_2;
    public $flash1_msg_3;
    public $flash1_msg_4;
    public $flash1_msg_5;
    public $flash1_msg_6;
    public $flash_msg1;
    public $flash_msg2;
    public $flash_msg3, $flash_msg3_alt1, $flash_msg3_alt2;
    public $flash_msg4;
    public $flash_msg5;

    public function declarew()
    {
        $jsonData1 = file_get_contents(site_url('assets/json/school_ukk_hotel.postman_environment.json'));
        $myData1 = json_decode($jsonData1, true)['values'];

        // Create variables dynamically
        foreach ($myData1 as $item) {
            $this->aliases[$item['key']] = $item['value']; // Variable variable to create dynamic variables
            $this->v_input[$item['key'] . '_input'] = 'txt_' . $item['value'];
            $this->v_post[$item['key']] = $this->input->post('txt_' . $item['value']);
            $this->v_get[$item['key']] = $this->input->get('txt_' . $item['value']);
            $this->v_old[$item['key'] . '_old'] = 'old_' . $item['value'];
            $this->v_post_old[$item['key']] = $this->input->post('old_' . $item['value']);

            $this->v_filter1[$item['key']] = $item['value'] . '_min';
            $this->v_filter2[$item['key']] = $item['value'] . '_max';

            $this->v_filter1_get[$item['key']] = $this->input->get($item['value'] . '_min');
            $this->v_filter2_get[$item['key']] = $this->input->get($item['value'] . '_max');

            $this->flash1_msg_1[$item['key']] = 'Data ' . $item['value'] . ' berhasil disimpan!';
            $this->flash1_msg_2[$item['key']] = 'Data ' . $item['value'] . ' gagal disimpan!';
            $this->flash1_msg_3[$item['key']] = 'Data ' . $item['value'] . ' berhasil diubah!';
            $this->flash1_msg_4[$item['key']] = 'Data ' . $item['value'] . ' gagal diubah!';
            $this->flash1_msg_5[$item['key']] = 'Data ' . $item['value'] . ' berhasil dihapus!';
            $this->flash1_msg_6[$item['key']] = 'Data ' . $item['value'] . ' gagal dihapus!';

            $this->flash[$item['key']] = 'pesan_' . $item['key'];
            $this->flash_func[$item['key']] = '$(".' . $item['key'] . '").modal("show")';

            $this->flash_msg1[$item['key']] = $item['value'] . ' tidak bisa diupload!';
            $this->flash_msg2[$item['key']] = $item['value'] . ' tidak bisa diupload!';
            $this->flash_msg3[$item['key']] = $item['value'] . ' salah!';
            $this->flash_msg3_alt1[$item['key']] = $item['value'] . ' lama salah!';
            $this->flash_msg3_alt2[$item['key']] = 'Konfirmasi' . $item['value'] . ' lama salah!';
            $this->flash_msg4[$item['key']] = $item['value'] . ' tidak tersedia!';
            $this->flash_msg5[$item['key']] = $item['value'] . ' telah digunakan!';
        }

        $jsonData2 = file_get_contents(site_url('assets/json/school_ukk_hotel_tables.postman_environment.json'));
        $myData2 = json_decode($jsonData2, true)['values'];

        // Create variables dynamically
        foreach ($myData2 as $item) {
            $this->v_upload_path[$item['key']] = './assets/img/' . $item['key'] . '/';

            $this->v1[$item['key']] = '_contents/' . $item['key'] . '/index';
            $this->v2[$item['key']] = '_contents/' . $item['key'] . '/daftar';
            $this->v3[$item['key']] = '_contents/' . $item['key'] . '/admin';
            $this->v4[$item['key']] = '_contents/' . $item['key'] . '/laporan';
            $this->v5[$item['key']] = '_contents/' . $item['key'] . '/print';
            $this->v6[$item['key']] = '_contents/' . $item['key'] . '/konfirmasi';

            $this->v1_title[$item['key']] = $item['value'];
            $this->v2_title[$item['key']] = 'Daftar ' . $item['value'];
            $this->v3_title[$item['key']] = 'Data ' . $item['value'];
            $this->v4_title[$item['key']] = 'Laporan ' . $item['value'];
            $this->v5_title[$item['key']] = 'Data ' . $item['value'];
            $this->v6_title[$item['key']] = $item['value'] . ' Berhasil!';
        }

        $this->views = array(
            'v1' => '_layouts/template',
            'v1_title' => '',
            'v2' => 'login',
            'v2_title' => 'Login',
            'v3' => 'signup',
            'v3_title' => 'Sign Up',
            'v4' => 'no-level',
            'v4_title' => 'Anda tidak memiliki akses ke halaman ini!',
            'v5' => 'dashboard',
            'v5_title' => 'Dashboard',
            'v6' => 'home',
            'v6_title' => 'Selamat Datang',

            'tabel4_v2' => '_contents/tabel4/login',
            'tabel4_v2_title' => 'Login Sebagai ' . $this->aliases['tabel4_alias'],

            'tabel10_v2_alt' => '_contents/tabel10/daftar_tabel2',
            'tabel10_v2_alt_title' => 'Daftar ' . $this->aliases['tabel10_alias'] . ' dari ' . $this->aliases['tabel2_alias'],
            'tabel10_v3_alt' => '_contents/tabel10/admin_tabel2',
            'tabel10_v3_alt_title' => 'Data ' . $this->aliases['tabel10_alias'] . ' dari ' . $this->aliases['tabel2_alias'],
        );

        $this->flashdatas = array(
            'flash1' => 'pesan',
            'flash1_func1' => '$("#element").toast("show")',

            // Pesan unik di bawah ini menggunakan flash1 dan ditandai dengan note
            'flash1_note1' => 'Selamat datang ' . $this->session->userdata($this->aliases['tabel9_field6']) . ' ' . $this->session->userdata($this->aliases['tabel9_field2']) . '!',
            'flash1_note2' => 'Ayo kita lanjutkan ke pemesanan, ' . $this->session->userdata($this->aliases['tabel9_field6']) . ' ' . $this->session->userdata($this->aliases['tabel9_field2']) . '!',

            // Data Manupulation Flashdatas
            'flash2' => 'pesan_tambah',
            'flash2_func1' => '$(".tambah").modal("show")',

            'flash3' => 'pesan_ubah',
            'flash3_func1' => '$(".ubah").modal("show")',

            'flash4' => 'pesan_lihat',
            'flash4_func1' => '$(".lihat").modal("show")',

            // Notification and alert Flashdatas
            'flash5' => 'pesan_quickTour',
            'flash5_func1' => '$("#quickTour").modal("show")',
        );

        $this->tempdatas = array(

        );
    }
}
