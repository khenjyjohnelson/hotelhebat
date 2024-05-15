<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('add_text')) {
    function add_text($field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="form-group">
            <label for="{$input}">{$alias}</label>
            <input class="form-control" type="text" {$required} name="{$input}" id="{$input}"
              placeholder="Masukkkan {$alias}">
        </div>
        HTML;
    }
}

if (!function_exists('input_hidden')) {
    function input_hidden($field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <input type="hidden" name="{$input}" {$required} value="{$value}">
        HTML;
    }
}

if (!function_exists('edit_text')) {
    function edit_text($field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="form-group">
            <label for="{$input}">{$alias}</label>
            <input class="form-control" type="text" {$required} name="{$input}"
              placeholder="Masukkan {$alias}" value="{$value}">
        </div>
        HTML;
    }
}

if (!function_exists('edit_text')) {
    function edit_text($field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
            <input class="form-control" type="text" {$required} name="{$input}"
              placeholder="Masukkan {$alias}" value="{$value}">
        </div>
        HTML;
    }
}





if (!function_exists('add_textarea')) {
    function add_textarea($field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
            <textarea id="editor1" class="form-control" name="{$input}" $required
              placeholder="Masukkan {$alias}" {$required} cols="30" rows="10"></textarea>
        </div>
        HTML;
    }
}

if (!function_exists('edit_textarea')) {
    function edit_textarea($field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
            <textarea class="ckeditor form-control" name="{$input}"
              placeholder="Masukkan {$alias}" {required} cols="30" rows="10">{$value}</textarea>
        </div>
        HTML;
    }
}

if (!function_exists('add_file')) {
    function add_file($field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
            <input class="form-control-file" {$required} type="file" name="{$input}">
        </div>
        HTML;
    }
}

if (!function_exists('edit_file')) {
    function edit_file($tabel, $field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];
        $old = $data[$field . "_old"];

        return <<<HTML
        <div class="form-group">
            <img src="img/{$tabel}/{$value}" width="300">
        </div>
        <hr>

        <div class="form-group">
            <label>Ubah {$alias}</label>
            <input class="form-control-file" {$required} type="file" name="{$input}">
            <input type="hidden" name="{$old}" value="{$value}">
        </div>
        HTML;
    }
}