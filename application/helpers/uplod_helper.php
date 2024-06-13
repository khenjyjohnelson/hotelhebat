<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('upload_file')) {

    function upload_file($field_name, $config, $flash_key, $class) {
        $CI =& get_instance();
        $CI->load->library('upload', $config);
        $modal = '$("#' . $class . ' ").modal("show")';

        if (!$CI->upload->do_upload($field_name)) {
            // Set flashdata for the error message
            set_flashdata($flash_key, $CI->upload->display_errors());
            set_flashdata('modal', $modal);
            // Redirect back to the form
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            // Retrieve uploaded data
            return $CI->upload->data();
        }
    }
}
?>
