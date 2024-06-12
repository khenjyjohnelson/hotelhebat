<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('upload_file')) {

    function upload_file($field_name, $config) {
        $CI =& get_instance();
        $CI->load->library('upload', $config);

        if (!$CI->upload->do_upload($field_name)) {
            // Set flashdata for the error message
            $CI->session->set_flashdata('error', $CI->upload->display_errors());

            // Redirect back to the form
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            // Retrieve uploaded data
            return $CI->upload->data();
        }
    }
}
?>
