<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('row_data')) {
    function row_data($field, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang($field . '_alias');
        
        return <<<HTML
        <tr>
              <td class="table-secondary table-active">{$alias}</td>
              <td class="table-light">{$value}</td>
            </tr>
        HTML;
    }
}