<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Omnitags extends CI_Controller
{
    protected $language_code;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tampil');
        $this->load->helper('button');
        $this->load->helper('datetime');
        $this->load->helper('text');
        $this->load->helper('input');
        $this->load->helper('option');
        $this->load->helper('modal');
        $this->load->helper('js');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('user_agent');

        // Get the language code from the URL segment
        $this->language_code = $this->uri->segment(1);

        // Load and set the language
        $this->load_and_set_language();

        // Set security headers
        $this->set_security_headers();
    }

    private function load_and_set_language()
    {
        // Detect the preferred language
        $preferred_lang = $this->detect_preferred_language();

        // Define language folder and file mapping
        $language_mapping = [
            'zh' => 'chinese',
            'id' => 'indonesian',
            'en' => 'english',
            'fr' => 'french'
        ];

        // Load the appropriate language file
        if (array_key_exists($preferred_lang, $language_mapping)) {
            $folder = $language_mapping[$preferred_lang];
            $this->lang->load($preferred_lang . '_lang', $folder);
        } else {
            // Default to English if no preference or invalid preference is found
            $this->lang->load('en_lang', 'english');
        }
    }

    private function detect_preferred_language()
    {
        // Check if a language is set in the session
        if ($this->session->userdata('site_lang')) {
            return $this->session->userdata('site_lang');
        }

        // Check if a language parameter is present in the URL
        if ($this->input->get('language')) {
            $this->session->set_userdata('site_lang', $this->input->get('language'));
            return $this->input->get('language');
        }

        // Check if language is provided in the URL segment
        $segment = $this->uri->segment(1);
        if (!empty($segment) && in_array($segment, ['zh', 'id', 'en', 'fr'])) {
            $this->session->set_userdata('site_lang', $segment);
            return $segment;
        }

        // Default to English if no preference is found
        return 'en';
    }

    private function set_security_headers()
    {
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

    // Di bawah ini adalah fungsi config
    public $file_type1 = 'png|jpg|jpeg';
    public $file_type2 = 'pdf';
    public $phase_0 = '<br><span class="h6"> (pre-alpha phase)</span>';
    public $phase_1 = '<br><span class="h6"> (alpha phase)</span>';
    public $phase_2 = '<br><span class="h6"> (beta phase)</span>';
    public $phase_3 = '<br><span class="h6"> (release candidate phase)</span>';
    public $phase_4 = '';  // feature released

    public $aliases, $views, $flashdatas, $tempdatas, $show;
    public $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8;
    public $v1_title, $v2_title, $v3_title, $v4_title, $v5_title, $v6_title, $v7_title, $v8_title;
    public $v_input, $v_post, $v_get, $v_old, $v_post_old;
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
        $jsonData1 = file_get_contents(site_url('assets/json/school_ukk_hotel.postman_environment.json'));
        $this->myData1 = json_decode($jsonData1, true)['values'];

        // Create variables dynamically
        foreach ($this->myData1 as $item) {
            $this->aliases[$item['key']] = $item['value']; // Variable variable to create dynamic variables
            $this->reverse[$item['value'] . '_realname'] = $item['key'];
            $this->v_input[$item['key'] . '_input'] = 'txt_' . $item['value'];
            $this->v_post[$item['key']] = $this->input->post('txt_' . $item['value']);
            $this->v_get[$item['key']] = $this->input->get('txt_' . $item['value']);
            $this->v_old[$item['key'] . '_old'] = 'old_' . $item['value'];
            $this->v_post_old[$item['key']] = $this->input->post('old_' . $item['value']);

            $this->v_filter1[$item['key'] . '_filter1'] = 'min_' . $item['value'];
            $this->v_filter2[$item['key'] . '_filter2'] = 'max_' . $item['value'];

            $this->v_filter1_get[$item['key']] = $this->input->get('min_' . $item['value']);
            $this->v_filter2_get[$item['key']] = $this->input->get('max_' . $item['value']);

            $this->flash1_msg_1[$item['key']] = 'Data ' . $item['value'] . ' berhasil disimpan!';
            $this->flash1_msg_2[$item['key']] = 'Data ' . $item['value'] . ' gagal disimpan!';
            $this->flash1_msg_3[$item['key']] = 'Data ' . $item['value'] . ' berhasil diubah!';
            $this->flash1_msg_4[$item['key']] = 'Data ' . $item['value'] . ' gagal diubah!';
            $this->flash1_msg_5[$item['key']] = 'Data ' . $item['value'] . ' berhasil dihapus!';
            $this->flash1_msg_6[$item['key']] = 'Data ' . $item['value'] . ' gagal dihapus!';

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
    
            $this->v1_title[$item['key']] = $item['value'];
            $this->v2_title[$item['key']] = 'Daftar ' . $item['value'];
            $this->v3_title[$item['key']] = 'Data ' . $item['value'];
            $this->v4_title[$item['key']] = 'Laporan ' . $item['value'];
            $this->v5_title[$item['key']] = 'Data ' . $item['value'];
            $this->v6_title[$item['key']] = 'Profil ' . $item['value'];
            $this->v7_title[$item['key']] = $item['value'] . ' Berhasil!';
            $this->v8_title[$item['key']] = 'Detail ' . $item['value'];
        }

        date_default_timezone_set($this->aliases['timezone']);
        $this->tabel_a1_field1 = 1;

        $this->theme = $this->tl_b7->tema($this->tabel_a1_field1)->result();
        $this->theme_id = $this->theme[0]->id_theme;

        $this->notif_limit = $this->tl_b9->get_b9_with_b8_limit($this->session->userdata($this->aliases['tabel_c2_field1']))->result();
        $this->notif_null = $this->tl_b9->get_b9_by_b9_field2($this->session->userdata($this->aliases['tabel_c2_field1']));

        $this->views = array(
            'tabel_c1_v2' => '_contents/tabel_c1/login',
            'tabel_c1_v2_title' => 'Login Sebagai ' . $this->aliases['tabel_c1_alias'],

            'tabel_f3_v2_alt' => '_contents/tabel_f3/daftar_history',
            'tabel_f3_v2_alt_title' => 'Daftar ' . $this->aliases['tabel_f3_alias'] . ' dari ' . $this->aliases['tabel_f1_alias'],
            'tabel_f3_v3_alt' => '_contents/tabel_f3/admin_tabel_f1',
            'tabel_f3_v3_alt_title' => 'Data ' . $this->aliases['tabel_f3_alias'] . ' dari ' . $this->aliases['tabel_f1_alias'],

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
            'flash1_note1' => 'Selamat datang ' . $this->session->userdata($this->aliases['tabel_c2_field6']) . ' ' . $this->session->userdata($this->aliases['tabel_c2_field2']) . '!',
            'flash1_note2' => 'Ayo kita lanjutkan ke pemesanan, ' . $this->session->userdata($this->aliases['tabel_c2_field6']) . ' ' . $this->session->userdata($this->aliases['tabel_c2_field2']) . '!',

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

        $this->session->set_flashdata($this->views['flash1'], $msg . $extra);
        $this->session->set_flashdata($flashtype, $this->views['flash1_func1']);
        return [];
    }

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

        $this->session->set_flashdata($this->views['flash1'], $msg . $extra);
        $this->session->set_flashdata($flashtype, $this->views['flash1_func1']);
        return [];
    }

    public function handle_1c($aksi, $object)
    {
        if ($aksi) {
            $msg = $this->flash1_msg_1[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value4'];
            $extra = '';
            $flashtype = 'modal';
        } else {
            $msg = $this->flash1_msg_2[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value6'];
            $extra = '';
            $flashtype = 'modal';
        }

        $this->session->set_flashdata($this->views['flash2'], $msg . $extra);
        $this->session->set_flashdata($flashtype, $this->views['flash2_func1']);
        return [];
    }

    public function handle_1d($aksi, $object)
    {
        if ($aksi) {
            $msg = $this->flash1_msg_1[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value4'];
            $extra = '';
            $flashtype = 'modal';
        } else {
            $msg = $this->flash1_msg_2[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value6'];
            $extra = '';
            $flashtype = 'modal';
        }
        $this->add_notif($msg, $type, $extra);

        $this->session->set_flashdata($this->views['flash2'], $msg . $extra);
        $this->session->set_flashdata($flashtype, $this->views['flash2_func1']);
        return [];
    }

    public function handle_2a($aksi, $object, $value)
    {
        if ($aksi) {
            $msg = $this->flash1_msg_3[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value4'];
            $extra = ' (' . $this->aliases[$object . '_alias'] . ') = ' . $value;
            $flashtype = 'toast';
        } else {
            $msg = $this->flash1_msg_4[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value6'];
            $extra = ' (' . $this->aliases[$object . '_alias'] . ') = ' . $value;
            $flashtype = 'toast';
        }

        $this->session->set_flashdata($this->views['flash1'], $msg . $extra);
        $this->session->set_flashdata($flashtype, $this->views['flash1_func1']);
        return [];
    }

    public function handle_2b($aksi, $object, $value)
    {
        if ($aksi) {
            $msg = $this->flash1_msg_3[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value4'];
            $extra = ' (' . $this->aliases[$object . '_alias'] . ') = ' . $value;
            $flashtype = 'toast';
        } else {
            $msg = $this->flash1_msg_4[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value6'];
            $extra = ' (' . $this->aliases[$object . '_alias'] . ') = ' . $value;
            $flashtype = 'toast';
        }

        $this->add_notif($msg, $type, $extra);

        $this->session->set_flashdata($this->views['flash1'], $msg . $extra);
        $this->session->set_flashdata($flashtype, $this->views['flash1_func1']);
        return [];
    }

    public function handle_2c($aksi, $object, $value)
    {
        if ($aksi) {
            $msg = $this->flash1_msg_3[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value4'];
            $extra = ' (' . $this->aliases[$value . '_alias'] . ') = ' . $value;
            $flashtype = 'modal';
        } else {
            $msg = $this->flash1_msg_4[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value6'];
            $extra = ' (' . $this->aliases[$value . '_alias'] . ') = ' . $value;
            $flashtype = 'modal';
        }

        $this->session->set_flashdata($this->views['flash3'], $msg . $extra);
        $this->session->set_flashdata($flashtype, $this->views['flash3_func1']);
        return [];
    }

    public function handle_2d($aksi, $object, $value)
    {
        if ($aksi) {
            $msg = $this->flash1_msg_3[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value4'];
            $extra = ' (' . $this->aliases[$value . '_alias'] . ') = ' . $value;
            $flashtype = 'modal';
        } else {
            $msg = $this->flash1_msg_4[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value6'];
            $extra = ' (' . $this->aliases[$value . '_alias'] . ') = ' . $value;
            $flashtype = 'modal';
        }
        $this->add_notif($msg, $type, $extra);

        $this->session->set_flashdata($this->views['flash3'], $msg . $extra);
        $this->session->set_flashdata($flashtype, $this->views['flash3_func1']);
        return [];
    }

    public function handle_2e($aksi, $object, $value)
    {
        if ($aksi) {
            $msg = $this->flash1_msg_3[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value4'];
            $extra = ' (' . $this->aliases[$value . '_alias'] . ') = ' . $value;
            $flashtype = 'modal';
        } else {
            $msg = $this->flash1_msg_4[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value6'];
            $extra = ' (' . $this->aliases[$value . '_alias'] . ') = ' . $value;
            $flashtype = 'modal';
        }

        $this->session->set_flashdata($this->flash[$object . $this->v_post[$object]], $msg . $extra);
        $this->session->set_flashdata($flashtype, '$("#' . $this->aliases[$object] . $this->v_post[$value] . '").modal("show")');
        return [];
    }

    public function handle_2f($aksi, $object, $value)
    {
        if ($aksi) {
            $msg = $this->flash1_msg_3[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value4'];
            $extra = ' (' . $this->aliases[$value . '_alias'] . ') = ' . $value;
            $flashtype = 'modal';
        } else {
            $msg = $this->flash1_msg_4[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value6'];
            $extra = ' (' . $this->aliases[$value . '_alias'] . ') = ' . $value;
            $flashtype = 'modal';
        }
        $this->add_notif($msg, $type, $extra);

        $this->session->set_flashdata($this->flash[$object . $this->v_post[$object]], $msg . $extra);
        $this->session->set_flashdata($flashtype, '$("#' . $this->aliases[$object] . $this->v_post[$value] . '").modal("show")');
        return [];
    }

    public function handle_3a($aksi, $object, $value)
    {
        if ($aksi) {
            $msg = $this->flash1_msg_5[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value4'];
            $extra = ' (' . $this->aliases[$object . '_alias'] . ') = ' . $value;
            ;
            $flashtype = 'toast';
        } else {
            $msg = $this->flash1_msg_6[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value6'];
            $extra = ' (' . $this->aliases[$object . '_alias'] . ') = ' . $value;
            ;
            $flashtype = 'toast';
        }

        $this->session->set_flashdata($this->views['flash1'], $msg . $extra);
        $this->session->set_flashdata($flashtype, $this->views['flash1_func1']);
        return [];
    }

    public function handle_3b($aksi, $object, $value)
    {
        if ($aksi) {
            $msg = $this->flash1_msg_5[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value4'];
            $extra = ' (' . $this->aliases[$object . '_alias'] . ') = ' . $value;
            $flashtype = 'toast';
        } else {
            $msg = $this->flash1_msg_6[$object . '_alias'];
            $type = $this->aliases['tabel_b8_field2_value6'];
            $extra = ' (' . $this->aliases[$object . '_alias'] . ') = ' . $value;
            $flashtype = 'toast';
        }

        $this->add_notif($msg, $type, $extra);

        $this->session->set_flashdata($this->views['flash1'], $msg . $extra);
        $this->session->set_flashdata($flashtype, $this->views['flash1_func1']);
        return [];
    }

    public function handle_4a($object, $value)
    {
        $msg = '';
        $type = $this->aliases['tabel_b8_field2_value5'];
        $extra = '';

        $this->add_notif_all($msg, $type, $extra);
        return [];
    }

    public function handle_4b()
    {
        if($this->session->userdata($this->aliases['tabel_c2_field1']) == ''){
            redirect(site_url($language . '/' . 'no_level'));
        } else {
            $msg = 'Selamat datang ' . $this->session->userdata($this->aliases['tabel_c2_field6']) . ' ' . $this->session->userdata($this->aliases['tabel_c2_field2']) . '!';
            $type = $this->aliases['tabel_b8_field2_value5'];
            $extra = '';
            $flashtype = 'toast';
    
            $this->add_notif_all($msg, $type, $extra);
            $this->session->set_flashdata($this->views['flash1'], $msg . $extra);
            $this->session->set_flashdata($flashtype, $this->views['flash1_func1']);
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

    public function add_notif($msg, $type, $extra)
    {
        $notif = array(
            $this->aliases['tabel_b9_field2'] => $this->session->userdata($this->aliases['tabel_c2_field1']),
            $this->aliases['tabel_b9_field3'] => $type,
            $this->aliases['tabel_b9_field4'] => $msg . $extra,
            $this->aliases['tabel_b9_field5'] => date("Y-m-d\TH:i:s"),
        );

        $ambil = $this->tl_b9->insert_b9($notif);
    }

    public function add_notif_all($msg, $type, $extra)
    {
        $users = $this->tl_d3->get_d3_by_c2_field1($this->session->userdata($this->aliases['tabel_c2_field1']));

        if ($users->num_rows() < 2) {
            $notif = array(
                $this->aliases['tabel_b9_field2'] => $this->session->userdata($this->aliases['tabel_c2_field1']),
                $this->aliases['tabel_b9_field3'] => $type,
                $this->aliases['tabel_b9_field4'] => $msg . $extra,
                $this->aliases['tabel_b9_field5'] => date("Y-m-d\TH:i:s"),
            );

            $ambil = $this->tl_b9->insert_b9($notif);
        } else {

        }
    }
}
