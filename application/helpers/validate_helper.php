// application/helpers/form_validation_helper.php
<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('validate_form')) {
    function validate_form($rules) {
        $CI =& get_instance();
        $CI->load->library('form_validation');
        
        foreach ($rules as $field => $rule) {
            $CI->form_validation->set_rules($field, $rule['label'], $rule['rules']);
        }
        
        return $CI->form_validation->run();
    }
}
