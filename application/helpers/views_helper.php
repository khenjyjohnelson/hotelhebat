<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('load_view')) {
    function load_view($view_name)
    {
        $CI =& get_instance();
        $CI->load->view($view_name);
    }
}

if (!function_exists('load_view_data')) {
    function load_view_data($view_name, $data)
    {
        $CI =& get_instance();
        $CI->load->view($view_name, $data);
    }
}