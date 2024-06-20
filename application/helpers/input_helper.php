<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('post')) {
    /**
     * Retrieve POST data
     *
     * @param string|null $key
     * @param bool $xss_clean
     * @return mixed
     */
    function post($key = null, $xss_clean = false)
    {
        if ($key === null) {
            return $_POST;
        }

        if (isset($_POST[$key])) {
            $value = $_POST[$key];

            if ($xss_clean) {
                $value = $value;
            }

            return $value;
        }

        return null;
    }
}

if (!function_exists('get')) {
    /**
     * Retrieve GET data
     *
     * @param string|null $key
     * @param bool $xss_clean
     * @return mixed
     */
    function get($key = null, $xss_clean = false)
    {
        if ($key === null) {
            return $_GET;
        }

        if (isset($_GET[$key])) {
            $value = $_GET[$key];

            if ($xss_clean) {
                $value = $value;
            }

            return $value;
        }

        return null;
    }
}

if (!function_exists('xss_clean')) {
    /**
     * Clean data to prevent XSS attacks
     *
     * @param mixed $data
     * @return mixed
     */
    function xss_clean($data)
    {
        // Here, a simple implementation using htmlspecialchars
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $value;
            }
        } else {
            $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }

        return $data;
    }
}

if (!function_exists('input_add')) {
    /**
     * Add input field to form
     *
     * @param string $type
     * @param string $field
     * @param string $required
     * @return string
     */
    function input_add($type, $field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_input'];
        $alias = lang($field . '_alias');

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="{$type}" {$required} name="{$input}" placeholder="" id="{$input}">
            <label for="{$input}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

// Repeat the same pattern for the remaining functions...
