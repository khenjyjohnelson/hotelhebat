<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('post')) {
    function post($key = null, $xss_clean = false)
    {
        if ($key === null) {
            return $_POST;
        }

        if (isset($_POST[$key])) {
            $value = $_POST[$key];

            if ($xss_clean) {
                $value = xss_clean($value);
            }

            return $value;
        }

        return null;
    }
}

if (!function_exists('get')) {
    function get($key = null, $xss_clean = false)
    {
        if ($key === null) {
            return $_GET;
        }

        if (isset($_GET[$key])) {
            $value = $_GET[$key];

            if ($xss_clean) {
                $value = xss_clean($value);
            }

            return $value;
        }

        return null;
    }
}


if (!function_exists('xss_clean')) {
    function xss_clean($data)
    {
        // Here, a simple implementation using htmlspecialchars
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = xss_clean($value);
            }
        } else {
            $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }

        return $data;
    }
}

if (!function_exists('add_text')) {
    function add_text($field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_input'];
        $alias = lang($field . '_alias');

        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="text" {$required} name="{$input}" id="{$input}">
            <label for="{$input}" class="form-label" class="form-label">{$alias}</label>
        </div>
        HTML;
    }
}

if (!function_exists('add_date')) {
    function add_date($field, $required, $min, $max)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_input'];
        $alias = lang($field . '_alias');
        $placeholder = lang($field . '_alias' . '_input');



        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="date" {$required} name="{$input}" id="{$input}"
            min="{$min}" max="{$max}">
            <label for="{$input}" class="form-label">{$alias}</label>
        </div>
        HTML;
    }
}

if (!function_exists('add_number')) {
    function add_number($field, $required, $min, $max)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="number" {$required} name="{$input}" id="{$input}"
            min="{$min}" max="{$max}">
            <label for="{$input}" class="form-label">{$alias}</label>
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

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="email" {$required} name="{$input}" id="{$input}">
            <label for="{$input}" class="form-label">{$alias}</label>
        </div>
        HTML;
    }
}

if (!function_exists('add_new_password')) {
    function add_new_password($field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="password" {$required} name="{$input}" id="{$input}"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            <label for="{$input}" class="form-label">{$alias}</label>
        </div>
        HTML;
    }
}


if (!function_exists('add_confirm')) {
    function add_confirm($field, $type, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang($field . '_alias' . '_confirm');
        $input = $data[$field . '_confirm'];

        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="{$type}" {$required} name="{$input}">
            <label for="{$input}" class="form-label">{$alias}</label>
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

        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="text" {$required} name="{$input}">
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

        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="email" {$required} name="{$input}">
        </div>
        HTML;
    }
}

if (!function_exists('add_new_password_prepend')) {
    function add_new_password_prepend($field, $icon, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_new'];

        $placeholder = lang($field . '_alias' . '_new');

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" id="psw" type="password" {$required} name="{$input}"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
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

        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="password" {$required} name="{$input}">
        </div>
        HTML;
    }
}

if (!function_exists('add_old_prepend')) {
    function add_old_prepend($field, $icon, $type, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_old'];

        $placeholder = lang($field . '_alias' . '_old');

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="{$type}" {$required} name="{$input}">
        </div>
        HTML;
    }
}

if (!function_exists('add_new_prepend')) {
    function add_new_prepend($field, $icon, $type, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_new'];

        $placeholder = lang($field . '_alias' . '_new');

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="{$type}" {$required} name="{$input}">
        </div>
        HTML;
    }
}

if (!function_exists('add_confirm_prepend')) {
    function add_confirm_prepend($field, $icon, $type, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_confirm'];

        $placeholder = lang($field . '_alias' . '_confirm');

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="{$type}" {$required} name="{$input}">
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

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

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

        $input = $data[$field . '_input'];
        $alias = lang($field . '_alias');
        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="text" {$required} name="{$input}"
            value="{$value}">
            <label for="{$input}" class="form-label">{$alias}</label>
        </div>
        HTML;
    }
}

if (!function_exists('edit_date')) {
    function edit_date($field, $value, $required, $min, $max)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_input'];
        $alias = lang($field . '_alias');

        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="date" {$required} name="{$input}"
            value="{$value}" min="{$min}" max="{$max}">
            <label for="{$input}" class="form-label">{$alias}</label>
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

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="email" {$required} name="{$input}"
            value="{$value}">
        </div>
        HTML;
    }
}

if (!function_exists('edit_number')) {
    function edit_number($field, $value, $required, $min, $max)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="number" {$required} name="{$input}"
            value="{$value}" min="{$min}" max="{$max}">
            <label class="form-label">{$alias}</label>
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

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="form-group">
            <input class="form-control float" type="email" {$required} name="{$input}"
            value="{$value}">
            <label class="form-label">{$alias}</label>
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

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">{$icon}</span>
            </div>
            <input class="form-control" type="email" {$required} name="{$input}"
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

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
            <textarea id="editor1" class="form-control float" name="{$input}" $required
            {$required} cols="30" rows="10"></textarea>
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

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
            <textarea class="ckeditor form-control float" name="{$input}"
            {required} cols="10" rows="10">{$value}</textarea>
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

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];

        $placeholder = lang($field . '_alias' . '_input');

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

        $alias = lang($field . '_alias');
        $input = $data[$field . '_input'];
        $old = $data[$field . "_old"];

        $placeholder = lang($field . '_alias' . '_input');

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

        $placeholder = lang($field . '_alias' . '_input');

        return <<<HTML
        <td class="pr-2">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{$posisi}</span>
            </div>
            <input type="date" class="form-control float" {$required} name="{$field}" value="{$value}">
            </div>
        </td>
        HTML;
    }
}


if (!function_exists('select_add')) {
    function select_add($field, $selected, $values, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = lang($field . '_alias' . '_select');
        $input = $data[$field . '_input'];

        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
            <select class="form-control float" {$required} name="{$input}">
                {$selected}
                {$values}
            </select>
        </div>
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

        $alias = lang($field . '_alias' . '_select');
        $input = $data[$field . '_input'];

        return <<<HTML
        <div class="form-group">
            <select class="form-control float" {$required} name="{$input}">
                {$selected}
                {$values}
            </select>
            <label class="form-label">{$alias}</label>
        </div>
        HTML;
    }
}

if (!function_exists('select_input')) {
    function select_input($options, $selected_value, $field1, $field2, $alias, $input_name, $input_id = null, $input_class = 'form-control', $required = true)
    {
        $html = '<div class="form-group">';
        $html .= '<select class="' . $input_class . '" name="' . $input_name . '" id="' . $input_id . '" ' . ($required ? 'required' : '') . '>';

        foreach ($options as $option) {
            $value = $option->$field1;
            $display = $option->$field2;
            $selected = ($selected_value == $value) ? 'selected' : '';
            $html .= '<option value="' . $value . '" ' . $selected . '>' . $display . '</option>';
        }

        $html .= '</select>';
        $html .= '<label class="form-label">' . $alias . '</label>';
        $html .= '</div>';

        return $html;
    }
}
