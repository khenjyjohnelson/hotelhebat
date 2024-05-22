<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('title')) {
    function title($main)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $title = lang($data[$main] . '_title');

        return <<<HTML
        {$title}
        HTML;
    }
}

if (!function_exists('headings')) {
    function headings($main, $phase)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $title = lang($data[$main] . '_title');
        $subtitle = $data[$phase];

        return <<<HTML
        {$title}<br><span class="h6"> {$subtitle}</span>
        HTML;
    }
}