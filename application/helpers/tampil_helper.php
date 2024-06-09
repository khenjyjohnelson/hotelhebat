<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('row_data')) {
    function row_data($field, $value)
    {        
        
        $alias = lang($field . '_alias');
        
        return <<<HTML
        <tr>
              <td width="30%" class="table-secondary table-active">{$alias}</td>
              <td width="" class="table-light">{$value}</td>
            </tr>
        HTML;
    }
}

if (!function_exists('row_file')) {
    function row_file($tabel_class, $field, $value)
    {        
        
        $alias = lang($field . '_alias');
        
        return <<<HTML
        <tr>
              <td width="30%" class="table-secondary table-active">{$alias}</td>
              <td width="" class="table-light">
                <img src="img/{$tabel_class}/{$value}" width="75%"></td>
            </tr>
        HTML;
    }
}

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

if (!function_exists('password_req')) {
    function password_req()
    {
        return <<<HTML
        <div id="message" class="mb-3">
              <label class="checkpass">Password must contain the following:</label><br>
              <div class="row">
                <div class="col-md-6">
                  <label id="letter" class="checkpass invalid">A <b>lowercase</b> letter</label><br>
                  <label id="capital" class="checkpass invalid">A <b>capital (uppercase)</b> letter</label><br>
                  
                </div>
                <div class="col-md-6">
                  <label id="number" class="checkpass invalid">A <b>number</b></label><br>
                  <label id="length" class="checkpass invalid">Minimum <b>8 characters</b></label>
                  
                </div>
              </div>
            </div>
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
            <img src="img/{$tabel_class}/{$value}" width="300">
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