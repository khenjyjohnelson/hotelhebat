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

if (!function_exists('add_number')) {
    function add_number($field, $required)
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
            <input class="form-control" type="number" {$required} name="{$input}" id="{$input}"
              placeholder="Masukkkan {$alias}">
        </div>
        HTML;
    }
}

if (!function_exists('add_email')) {
    function add_email($field, $required)
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
            <input class="form-control" type="email" {$required} name="{$input}" id="{$input}"
              placeholder="Masukkkan {$alias}">
        </div>
        HTML;
    }
}

if (!function_exists('add_text_prepend')) {
    function add_text_prepend($field, $icon, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="text" required name="{$input}" placeholder="Masukkan {$alias}">
        </div>
        HTML;
    }
}

if (!function_exists('add_email_prepend')) {
    function add_email_prepend($field, $icon, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="email" required name="{$input}" placeholder="Masukkan {$alias}">
        </div>
        HTML;
    }
}

if (!function_exists('add_password_prepend')) {
    function add_password_prepend($field, $icon, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="password" required name="{$input}" placeholder="Masukkan {$alias}">
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

if (!function_exists('edit_text_prepend')) {
    function edit_text_prepend($field, $value, $icon, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="email" required name="{$input}"
            value="{$value}">
        </div>
        HTML;
    }
}

if (!function_exists('edit_number')) {
    function edit_number($field, $value, $required)
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
            <input class="form-control" type="number" {$required} name="{$input}"
              placeholder="Masukkan {$alias}" value="{$value}">
        </div>
        HTML;
    }
}

if (!function_exists('edit_email')) {
    function edit_email($field, $value, $required)
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
            <input class="form-control" type="email" {$required} name="{$input}"
              placeholder="Masukkan {$alias}" value="{$value}">
        </div>
        HTML;
    }
}

if (!function_exists('edit_email_prepend')) {
    function edit_email_prepend($field, $value, $icon, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="email" required name="{$input}"
            value="{$value}">
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

if (!function_exists('filter_tgl')) {
    function filter_tgl($posisi, $field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $value = $data[$field . "_value"];

        return <<<HTML
        <td class="pr-2">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$posisi}</span>
            </div>
            <input type="date" class="form-control" {$required} name="{$field}" value="{$value}">
            </div>
        </td>
        HTML;
    }
}



if (!function_exists('select_ubah')) {
    function select_ubah($field, $selected, $values, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . "_alias"];
        $input = $data[$field . "_input"];

        return <<<HTML
        <div class="form-group">
            <label>Pilih {$alias}</label>
            <select class="form-control" required name="{$input}">
            {$selected}
            {$values}
            </select>
        </div>
        HTML;
    }
}


