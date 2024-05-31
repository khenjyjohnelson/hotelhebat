<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('back_to_home')) {
    function back_to_home()
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang('back_to_home');
        $url = site_url($data['language'] . '/home');

        return <<<HTML
        <a class="text-decoration-none" href="{$url}">{$alias}</a>
        HTML;
    }
}

if (!function_exists('btn_tambah')) {
    function btn_tambah()
    {
        $alias = lang('add');

        return <<<HTML
        <button class="btn mr-1 btn-primary mb-4 mr-1" type="button" data-toggle="modal" data-target="#tambah">+ {$alias}</button>
        HTML;
    }
}

if (!function_exists('btn_simpan')) {
    function btn_simpan()
    {
        $alias = lang('save_data');

        return <<<HTML
        <button class="btn mr-1 btn-success" type="submit">{$alias}</button>
        HTML;
    }
}

if (!function_exists('btn_tutup')) {
    function btn_tutup()
    {
        $alias = lang('close_dialog');

        return <<<HTML
        <button class="btn btn-secondary" data-dismiss="modal">{$alias}</button>
        HTML;
    }
}

if (!function_exists('btn_book')) {
    function btn_book($value)
    {
        $alias = lang('input');

        return <<<HTML
        <a class="btn btn-light text-success" type="button" data-toggle="modal"
            data-target="#book{$value}">
            <i class="fas fa-concierge-bell"></i>
        </a>
        HTML;
    }
}

if (!function_exists('view_switcher')) {
    function view_switcher()
    {
        return <<<HTML
        <div class="btn-group mb-4" role="group" aria-label="View Toggle">
        <button type="button" class="btn btn-primary view-toggle active" data-target="card-view"><i
            class="fas fa-th-large"></i></button>
        <button type="button" class="btn btn-primary view-toggle" data-target="table-view"><i
            class="fas fa-table"></i></button>
        </div>
        HTML;
    }
}

if (!function_exists('btn_field')) {
    function btn_field($value, $logo)
    {
        $alias = lang($value);

        return <<<HTML
        <a class="btn mr-1 mb-4 btn-light text-warning" type="button" data-toggle="modal"
            data-target="#{$value}">
            {$logo}
        </a>
        HTML;
    }
}

if (!function_exists('btn_update')) {
    function btn_update()
    {
        $alias = lang('update_data');

        return <<<HTML
        <button class="btn mr-1 btn-success" type="submit">{$alias}</button>
        HTML;
    }
}

if (!function_exists('btn_update_field')) {
    function btn_update_field($field)
    {
        $alias = lang('update_data');

        $placeholder = $alias . ' ' . lang($field);

        return <<<HTML
        <button class="btn mr-1 btn-success" type="submit" 
        onclick="return confirm({$placeholder})">{$alias}</button>
        HTML;
    }
}

if (!function_exists('btn_cari')) {
    function btn_cari()
    {
        $alias = lang('input');

        return <<<HTML
        <button class="btn mr-1 btn-success" type="submit">
          <a type="submit"><i class="fas fa-search"></i></a>
        </button>
        HTML;
    }
}

if (!function_exists('btn_lihat')) {
    function btn_lihat($value)
    {
        $alias = lang('input');

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-light text-info" type="button" data-toggle="modal"
            data-target="#lihat{$value}">
            <i class="fas fa-eye"></i></a>
        HTML;
    }
}

if (!function_exists('btn_edit')) {
    function btn_edit($value)
    {
        $alias = lang('input');

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-light text-warning" type="button" data-toggle="modal"
              data-target="#ubah{$value}">
              <i class="fas fa-edit"></i></a>
        HTML;
    }
}


if (!function_exists('btn_laporan')) {

    function btn_laporan($tabel)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = $data[$tabel];

        $lang = $data['language'];

        $url = site_url($lang . '/' . $controller . '/laporan');
        $alias = lang('print_report');

        return <<<HTML
        <a class="btn mr-1 btn-info mb-4" href="{$url}" target="_blank">
            <i class="fas fa-print"></i> {$alias}</a>
        HTML;
    }
}

if (!function_exists('btn_print')) {

    function btn_print($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = $data[$tabel];

        $lang = $data['language'];

        $url = site_url($lang . '/' . $controller . '/print/' . $value);

        return <<<HTML
        <a class="btn btn-light text-info" href="{$url}"
              target="_blank">
              <i class="fas fa-print"></i>
            </a>
        HTML;
    }
}

if (!function_exists('btn_kelola')) {

    function btn_kelola($tabel)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang($tabel . '_alias' . '_btn');
        $controller = $data[$tabel];
        $lang = $data['language'];
        $url = site_url($lang . '/' . $controller . '/admin');



        return <<<HTML
        <a class="btn mr-1 mb-4 btn-info text-light" href="{$url}">
        <i class="fas fa-edit"></i> {$alias}</a>
        HTML;
    }
}

if (!function_exists('btn_redo')) {
    function btn_redo($tabel, $function)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = $data[$tabel];
        $lang = $data['language'];

        $url = site_url($lang . '/' . $controller . '/admin');

        $alias = lang('input');

        return <<<HTML
        <a class="btn mr-1 btn-danger" type="button" href="{$url}">
          <i class="fas fa-redo"></i></a>
        HTML;
    }
}


if (!function_exists('btn_hapus')) {
    function btn_hapus($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = $data[$tabel];
        $alias = lang($tabel . '_alias');
        $lang = $data['language'];

        $url = site_url($lang . '/' . $controller . '/hapus/' . $value);

        $alias = lang('input');

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-light text-danger" onclick="return confirm('Hapus data {$alias}?')"
              href="{$url}">
              <i class="fas fa-trash"></i></a>
        HTML;
    }
}

if (!function_exists('btn_toggle_on')) {
    function btn_toggle_on($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = $data[$tabel];
        $lang = $data['language'];

        $url = site_url($lang . '/' . $controller . '/aktifkan/' . $value);

        return <<<HTML

        <a class="text-warning" href="{$url}">
                <h4><i class="fas fa-toggle-off"></i></h4>
              </a>
        HTML;
    }
}

if (!function_exists('btn_toggle_off')) {
    function btn_toggle_off($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = $data[$tabel];
        $lang = $data['language'];

        $url = site_url($lang . '/' . $controller . '/nonaktifkan/' . $value);
        $alias = lang('input');

        return <<<HTML
        <a class="text-warning" href="{$url}">
                <h4><i class="fas fa-toggle-on"></i></h4>
              </a>
        HTML;
    }
}
