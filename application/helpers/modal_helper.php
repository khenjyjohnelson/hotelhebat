<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('modal_header')) {
    function modal_header($title, $subtitle)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $placeholder = lang('input');

        return <<<HTML
        <div class="modal-header">
            <h5 class="modal-title">{$title} {$subtitle}</h5>

            <button class="close" data-dismiss="modal">
            <span>&times;</span>
            </button>
        </div>
        HTML;
    }
}

if (!function_exists('modal_file')) {
    function modal_file($tabel_class, $field, $value)
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

if (!function_exists('modal_icon')) {
    function modal_icon($field, $required)
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