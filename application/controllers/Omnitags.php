<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Omnitags')) {
    class Omnitags extends CI_Controller
    {
        protected $language_code;

        public function __construct()
        {
            parent::__construct();
            //Menampilkan media
            $this->load->helper('tampil');
            // Tampil button
            $this->load->helper('button');
            // Kelola teks
            $this->load->helper('media');
            // Tampil input
            $this->load->helper('input');
            // Tampil modal
            $this->load->helper('modal');
            // Tampil card
            $this->load->helper('card');
            // Tampil dropdown
            $this->load->helper('dropdown');
            // Kelola js
            $this->load->helper('js');
            // Kelola url
            $this->load->helper('url');
            // Kelola views
            $this->load->helper('views');
            // Kelola session
            $this->load->helper('session');
            $this->load->library('session');
            $this->load->library('user_agent');

            // Get the language code from the URL segment
            $this->language_code = $this->uri->segment(1);

            // Load and set the language
            load_and_set_language();

            // Set security headers
            set_security_headers();
        }

        // Di bawah ini aku berencana untuk membuat sebuah array yang menampung semua jenis alias dari field dan nama tabel
        // Dan aku akan membuat array itu merge dengan array yang akan diload ke halaman view pada setiap
        // Controller yang ada di aplikasi ini, dengan begitu, aku tidak perlu khawatir jika ingin memulai projek baru
        // Dan ingin mengubah konten di dalamnya dalam waktu yang singkat

        // Aku ada rencana untuk menggunakan Toastr untuk menampilkan notifikasi toast
        // Ini adalah link : https://codeseven.github.io/toastr/demo.html

        // Di bawah ini adalah fungsi config
        public $file_type1 = 'png|jpg|jpeg';
        public $file_type2 = 'pdf';
        public $phase_0 = '<br><span class="h6"> (pre-alpha phase)</span>';
        public $phase_1 = '<br><span class="h6"> (alpha phase)</span>';
        public $phase_2 = '<br><span class="h6"> (beta phase)</span>';
        public $phase_3 = '<br><span class="h6"> (release candidate phase)</span>';
        public $phase_4 = '';  // feature released

        public $aliases, $views, $flashdatas, $tempdatas, $show, $package;
        public $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8;
        public $v1_title, $v2_title, $v3_title, $v4_title, $v5_title, $v6_title, $v7_title, $v8_title;
        public $v_input, $v_post, $v_get, $v_old, $v_post_old, $v_confirm, $v_new, $v_post_new, $v_post_confirm;
        public $v_upload_path, $v_filter1, $v_filter1_get, $v_filter2, $v_filter2_get;
        public $flash, $flash_func;
        public $notif_limit, $notif_null, $notifications, $elapsedTime, $elapsed, $elapsed2;
        public $recommendation, $theme, $theme_id;
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
        public $tabel_a1, $tabel_a1_field1;
        public $myData1, $myData2, $reverse;

        public function declarew()
        {
            $jsonData1 = file_get_contents(site_url('assets/json/app.postman_environment.json'));
            $this->myData1 = json_decode($jsonData1, true)['values'];

            // Create variables dynamically
            foreach ($this->myData1 as $item) {
                $this->v_input[$item['key'] . '_input'] = 'txt_' . $item['value'];
                $this->v_filter1[$item['key'] . '_filter1'] = 'min_' . $item['value'];
                $this->v_filter2[$item['key'] . '_filter2'] = 'max_' . $item['value'];
                $this->v_old[$item['key'] . '_old'] = 'old_' . $item['value'];
                $this->v_new[$item['key'] . '_new'] = 'new_' . $item['value'];
                $this->v_confirm[$item['key'] . '_confirm'] = 'confirm_' . $item['value'];
                $this->reverse[$item['value'] . '_realname'] = $item['key'];

                $this->aliases[$item['key']] = $item['value']; // Variable variable to create dynamic variables
                $this->v_post[$item['key']] = post('txt_' . $item['value']);
                $this->v_get[$item['key']] = get('txt_' . $item['value']);
                $this->v_post_old[$item['key']] = post('old_' . $item['value']);
                $this->v_post_new[$item['key']] = post('new_' . $item['value']);
                $this->v_post_confirm[$item['key']] = post('confirm_' . $item['value']);


                $this->v_filter1_get[$item['key']] = get('min_' . $item['value']);
                $this->v_filter2_get[$item['key']] = get('max_' . $item['value']);

                $this->flash1_msg_1[$item['key']] = lang($item['key'] . '_flash1_msg_1');
                $this->flash1_msg_2[$item['key']] = lang($item['key'] . '_flash1_msg_2');
                $this->flash1_msg_3[$item['key']] = lang($item['key'] . '_flash1_msg_3');
                $this->flash1_msg_4[$item['key']] = lang($item['key'] . '_flash1_msg_4');
                $this->flash1_msg_5[$item['key']] = lang($item['key'] . '_flash1_msg_5');
                $this->flash1_msg_6[$item['key']] = lang($item['key'] . '_flash1_msg_6');

                $this->flash[$item['key']] = 'pesan_' . $item['value'];
                $this->flash_func[$item['key']] = '$(".' . $item['value'] . '").modal("show")';

                $this->flash_msg1[$item['key']] = $item['value'] . ' tidak bisa diupload!';
                $this->flash_msg2[$item['key']] = $item['value'] . ' tidak bisa diupload!';
                $this->flash_msg3[$item['key']] = $item['value'] . ' salah!';
                $this->flash_msg3_alt1[$item['key']] = $item['value'] . ' lama salah!';
                $this->flash_msg3_alt2[$item['key']] = 'Konfirmasi' . $item['value'] . ' lama salah!';
                $this->flash_msg4[$item['key']] = $item['value'] . ' tidak tersedia!';
                $this->flash_msg5[$item['key']] = $item['value'] . ' telah digunakan!';

                $this->v_upload_path[$item['key']] = './assets/img/' . $item['key'] . '/';

                $this->v1[$item['key']] = '_contents/' . $item['key'] . '/index';
                $this->v2[$item['key']] = '_contents/' . $item['key'] . '/daftar';
                $this->v3[$item['key']] = '_contents/' . $item['key'] . '/admin';
                $this->v4[$item['key']] = '_contents/' . $item['key'] . '/laporan';
                $this->v5[$item['key']] = '_contents/' . $item['key'] . '/print';
                $this->v6[$item['key']] = '_contents/' . $item['key'] . '/profil';
                $this->v7[$item['key']] = '_contents/' . $item['key'] . '/konfirmasi';
                $this->v8[$item['key']] = '_contents/' . $item['key'] . '/detail';
            }

            date_default_timezone_set($this->aliases['timezone']);
            $this->tabel_a1_field1 = 1;

            $this->theme = $this->tl_b7->tema($this->tabel_a1_field1)->result();
            $this->theme_id = $this->theme[0]->id_theme;

            $this->notif_limit = $this->tl_b9->get_b9_with_b8_limit(userdata($this->aliases['tabel_c2_field1']))->result();
            $this->notif_null = $this->tl_b9->get_b9_by_b9_field2(userdata($this->aliases['tabel_c2_field1']));

            $this->views = array(
                'head' => '_partials/head',
                'phase' => $this->phase_1,
                'lisensi' => $this->tl_b5->get_b5_by_b5_field6_by_b5_field7($this->theme_id)->result(),
                'sosmed' => $this->tl_b6->get_b6_by_b6_field6_by_b6_field7($this->theme_id)->result(),
                'tbl_a1' => $this->theme,
                'notif' => $this->notif_limit,
                'notif_count' => $this->notif_null->num_rows(),
                'language' => $this->language_code,

                'flash1' => 'pesan',
                'flash1_func1' => '$("#element").toast("show")',

                // Pesan unik di bawah ini menggunakan flash1 dan ditandai dengan note
                'flash1_note1' => 'Selamat datang ' . userdata($this->aliases['tabel_c2_field6']) . ' ' . userdata($this->aliases['tabel_c2_field2']) . '!',
                'flash1_note2' => 'Ayo kita lanjutkan ke pemesanan, ' . userdata($this->aliases['tabel_c2_field6']) . ' ' . userdata($this->aliases['tabel_c2_field2']) . '!',

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

            $this->package = array_merge($this->views, $this->aliases, $this->v_input, $this->v_filter1, $this->v_filter2, $this->v_old, $this->v_new, $this->v_confirm, $this->reverse);
        }

        public function session_2()
        {
            switch (userdata($this->aliases['tabel_c2_field6'])) {
                case $this->aliases['tabel_c2_field6_value2']:
                    break;

                case $this->aliases['tabel_c2_field6_value1']:
                case $this->aliases['tabel_c2_field6_value3']:
                case $this->aliases['tabel_c2_field6_value5']:
                case $this->aliases['tabel_c2_field6_value4']:
                default:
                    redirect(site_url($this->views['language'] . '/welcome/404'));
                    break;
            }
        }

        public function session_3()
        {
            switch (userdata($this->aliases['tabel_c2_field6'])) {
                case $this->aliases['tabel_c2_field6_value3']:
                    break;

                case $this->aliases['tabel_c2_field6_value1']:
                case $this->aliases['tabel_c2_field6_value2']:
                case $this->aliases['tabel_c2_field6_value5']:
                case $this->aliases['tabel_c2_field6_value4']:
                default:
                    redirect(site_url($this->views['language'] . '/welcome/404'));
                    break;
            }
        }

        public function session_4()
        {
            switch (userdata($this->aliases['tabel_c2_field6'])) {
                case $this->aliases['tabel_c2_field6_value4']:
                    break;

                case $this->aliases['tabel_c2_field6_value1']:
                case $this->aliases['tabel_c2_field6_value2']:
                case $this->aliases['tabel_c2_field6_value3']:
                case $this->aliases['tabel_c2_field6_value5']:
                default:
                    redirect(site_url($this->views['language'] . '/welcome/404'));
                    break;
            }
        }

        public function session_4_5()
        {
            switch (userdata($this->aliases['tabel_c2_field6'])) {
                case $this->aliases['tabel_c2_field6_value4']:
                case $this->aliases['tabel_c2_field6_value5']:
                    break;

                case $this->aliases['tabel_c2_field6_value1']:
                case $this->aliases['tabel_c2_field6_value2']:
                case $this->aliases['tabel_c2_field6_value3']:
                default:
                    redirect(site_url($this->views['language'] . '/welcome/404'));
                    break;
            }
        }

        public function session_5()
        {
            switch (userdata($this->aliases['tabel_c2_field6'])) {
                case $this->aliases['tabel_c2_field6_value5']:
                    break;

                case $this->aliases['tabel_c2_field6_value1']:
                case $this->aliases['tabel_c2_field6_value2']:
                case $this->aliases['tabel_c2_field6_value3']:
                case $this->aliases['tabel_c2_field6_value4']:
                default:
                    redirect(site_url($this->views['language'] . '/welcome/404'));
                    break;
            }
        }

        // notification using toast, will be used
        public function handle_1a($aksi, $object)
        {
            if ($aksi) {
                $msg = $this->flash1_msg_1[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value4'];
                $extra = '';
                $flashtype = 'toast';
            } else {
                $msg = $this->flash1_msg_2[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = '';
                $flashtype = 'toast';
            }

            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification using toast, will be used
        // added to database
        public function handle_1b($aksi, $object)
        {
            if ($aksi) {
                $msg = $this->flash1_msg_1[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value4'];
                $extra = '';
                $flashtype = 'toast';
            } else {
                $msg = $this->flash1_msg_2[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = '';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);

            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification using toast, will be used
        // id specific, added to database
        public function handle_1c($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = $this->flash1_msg_3[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value4'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            } else {
                $msg = $this->flash1_msg_4[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);

            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification using modal, will be used
        // id specific, modal specific, added to database
        public function handle_1d($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = $this->flash1_msg_3[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value4'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'modal';
            } else {
                $msg = $this->flash1_msg_4[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'modal';
            }
            $this->add_notif($msg, $type, $extra);

            set_flashdata($this->flash[$object], $msg . $extra);
            set_flashdata($flashtype, '$("#' . $this->aliases[$object] . $value . '").modal("show")');
            return [];
        }

        // notification using toast, will be used
        // id specific, added to database
        public function handle_1e($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = $this->flash1_msg_5[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value4'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            } else { 
                $msg = $this->flash1_msg_6[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);

            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification shown in toast, will be used
        // added to database for all value5 users
        public function handle_2a()
        {
            if (userdata($this->aliases['tabel_c2_field1']) == '') {
                redirect(site_url($this->views['language'] . '/' . 'no_level'));
            } else {
                $msg = 'Selamat datang ' . userdata($this->aliases['tabel_c2_field6']) . ' ' . userdata($this->aliases['tabel_c2_field2']) . '!';
                $type = $this->aliases['tabel_b8_field2_value5'];
                $extra = '';
                $flashtype = 'toast';

                $this->add_notif_all($msg, $type, $extra);
                set_flashdata($this->views['flash1'], $msg . $extra);
                set_flashdata($flashtype, $this->views['flash1_func1']);
                return [];
            }
        }

        public function serve_image($directory, $filename)
        {
            // Set the correct content type
            header('Content-Type: image/jpeg'); // Adjust content type based on your image type

            // Serve the image file
            $file_path = FCPATH . ('assets/img/' . $directory . '/' . $filename);
            if (file_exists($file_path)) {
                readfile($file_path);
            } else {
                // Handle file not found error
                show_404();
            }
        }

        // adding the actual notif
        public function add_notif($msg, $type, $extra)
        {
            $notif = array(
                $this->aliases['tabel_b9_field2'] => userdata($this->aliases['tabel_c2_field1']),
                $this->aliases['tabel_b9_field3'] => $type,
                $this->aliases['tabel_b9_field4'] => $msg . $extra,
                $this->aliases['tabel_b9_field5'] => date("Y-m-d\TH:i:s"),
            );

            $ambil = $this->tl_b9->insert_b9($notif);
        }

        // adding the actual notif to all user based on c2_field1
        public function add_notif_all($msg, $type, $extra)
        {
            $users = $this->tl_d3->get_d3_by_c2_field1(userdata($this->aliases['tabel_c2_field1']));

            if ($users->num_rows() < 2) {
                $notif = array(
                    $this->aliases['tabel_b9_field2'] => userdata($this->aliases['tabel_c2_field1']),
                    $this->aliases['tabel_b9_field3'] => $type,
                    $this->aliases['tabel_b9_field4'] => $msg . $extra,
                    $this->aliases['tabel_b9_field5'] => date("Y-m-d\TH:i:s"),
                );

                $ambil = $this->tl_b9->insert_b9($notif);
            } else {

            }
        }
    }
} else {

}