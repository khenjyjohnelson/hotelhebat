<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('modal_header')) {
    function modal_header($title, $subtitle)
    {
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
        $alias = lang($field . '_alias');
        
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