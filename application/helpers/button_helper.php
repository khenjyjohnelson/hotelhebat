<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('btn_tambah')) {
    function btn_tambah()
    {
        return <<<HTML
        <button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
        HTML;
    }
}

if (!function_exists('btn_laporan')) {

    function btn_laporan($tabel)
    {
        $url = site_url($tabel . '/laporan');
        return <<<HTML
        <a class="btn btn-info mb-4" href="{$url}" target="_blank">
            <i class="fas fa-print"></i> Cetak Laporan</a>
        HTML;
    }
}

if (!function_exists('btn_simpan')) {
    function btn_simpan()
    {
        return <<<HTML
        <button class="btn btn-success" type="submit">Simpan</button>
        HTML;
    }
}

if (!function_exists('btn_tutup')) {
    function btn_tutup()
    {
        return <<<HTML
        <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        HTML;
    }
}

if (!function_exists('btn_update')) {
    function btn_update()
    {
        return <<<HTML
        <button class="btn btn-success" type="submit">Simpan Perubahan</button>
        HTML;
    }
}

if (!function_exists('btn_cari')) {
    function btn_cari()
    {
        return <<<HTML
        <button class="btn btn-success" type="submit">
          <a type="submit"><i class="fas fa-search"></i></a>
        </button>
        HTML;
    }
}

if (!function_exists('btn_redo')) {
    function btn_redo($tabel, $function)
    {
        return <<<HTML
        <a class="btn btn-danger" type="button" href="<?= site_url({$tabel} . {$function}) ?>">
          <i class="fas fa-redo"></i></a>
        HTML;
    }
}

if (!function_exists('btn_lihat')) {
    function btn_lihat($value)
    {
        return <<<HTML
        <a class="btn btn-light text-info" type="button" data-toggle="modal"
              data-target="#lihat{$value}">
              <i class="fas fa-eye"></i></a>
        HTML;
    }
}

if (!function_exists('btn_edit')) {
    function btn_edit($value)
    {
        return <<<HTML
        <a class="btn btn-light text-warning" type="button" data-toggle="modal"
              data-target="#ubah{$value}">
              <i class="fas fa-edit"></i></a>
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
        $alias = $data[$tabel . "_alias"];
        $url = site_url($controller . '/hapus/' . $value);

        return <<<HTML
        <a class="btn btn-light text-danger" onclick="return confirm('Hapus data $alias?')"
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
        $url = site_url($controller . '/aktifkan/' . $value);
        
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
        $url = site_url($controller . '/nonaktifkan/' . $value);
        return <<<HTML
        <a class="text-warning" href="{$url}">
                <h4><i class="fas fa-toggle-on"></i></h4>
              </a>
        HTML;
    }
}
