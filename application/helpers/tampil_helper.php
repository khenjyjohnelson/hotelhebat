<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('tampil_text')) {
    function tampil_text($field, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang($field . '_alias');

        $placeholder = lang('input');

        return <<<HTML
        <div class="form-group">
            <label>{$alias} : </label>
            <p>{$value}</p>
        </div>
        <hr>
        HTML;
    }
}

if (!function_exists('tampil_file')) {
    function tampil_file($tabel_class, $field, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang($field . '_alias');
        
        $placeholder = lang('input');

        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
        </div>
        <div class="form-group">
            <img src="img/{$tabel_class}/{$value}" width="450">
        </div>
        HTML;
    }
}

if (!function_exists('tampil_icon')) {
    function tampil_icon($field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang('input');

        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
            <textarea id="editor1" class="form-control" name="{$input}" $required
              placeholder="{$placeholder} {$alias}" {$required} cols="30" rows="10"></textarea>
        </div>
        HTML;
    }
}