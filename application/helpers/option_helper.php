<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('option_selected')) {
    function option_selected($value, $alias)
    {
        $placeholder = lang($alias . '_alias_select');

        return <<<HTML
        <option selected hidden value="{$value}">{$placeholder}</option>
        HTML;
    }
}

if (!function_exists('options')) {
    function options($value, $alias)
    {
        return <<<HTML
        <option value="{$value}">{$alias}</option>
        HTML;
    }
}

if (!function_exists('option_b1')) {
    function option_b1()
    {
        return <<<HTML
        <option value="a">a</option>
        <option value="b">b</option>
        <option value="c">c</option>
        <option value="d">d</option>
        <option value="f">f</option>
        <option value="0">0</option>
        HTML;
    }
}
