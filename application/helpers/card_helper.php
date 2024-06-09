<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('card_header')) {
    function card_header($title, $subtitle)
    {
        $title = xss_clean($title);
        $subtitle = xss_clean($subtitle);
        
        return <<<HTML
        <div class="card-header">
            <h5 class="card-title">{$title} {$subtitle}</h5>

            <button class="close" data-dismiss="card">
            <span>&times;</span>
            </button>
        </div>
        HTML;
    }
}

if (!function_exists('card_content')) {
    function card_content($field, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();
        
        $alias  = $data[$field . '_alias'];

        return <<<HTML
        '<div style="width: 70px; display: inline-block;">{$alias}</div>
        <div style="display: inline-block;">: {$value}</div><br>
        HTML;
    }
}

if (!function_exists('card_regular')) {
    function card_regular($id, $table, $title, $detail, $actions, $theme)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();
        
        return <<<HTML
        <div class="col-md-3 mt-2">
            <div class="card text-white {$theme}">
            <div class="card-body">
                <p class="card-text" style="font-size: 20px;">
                    {$title}
                </p>
                <p class="card-text">{$detail}</p>

                {$actions}
            </div>
            </div>
        </div>
        HTML;
    }
}

if (!function_exists('card_file')) {
    function card_file($id, $title, $detail, $actions, $table, $picture, $theme)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();
        
        return <<<HTML
        <div class="col-md-3 mt-2">
            <div class="card text-white {$theme}">
            <img src="img/{$table}/{$picture}" class="card-img-top img-fluid" style="max-height: 150px" alt="...">
            <div class="card-body">
                <p class="card-text" style="font-size: 18px;">
                    {$title}
                </p>
                <p class="card-text">{$detail}</p>

                {$actions}
            </div>
            </div>
        </div>
        HTML;
    }
}

if (!function_exists('card_count')) {
    function card_count($title, $controller, $theme, $count)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $url = site_url($data['language'] . '/' . $data[$controller] . '/admin');
        $detail = lang('detail') . ' >>';
        
        return <<<HTML
        <div class="col-md-3 mt-2">
            <div class="card text-white {$theme}">
            <div class="card-body">
                <h5 class="card-title">
                    {$title}
                </h5>
                <p class="card-text" style="font-size: 32;">
                    {$count}
                </p>
                <a class="text-white" href="{$url}">{$detail}</a>
            </div>
            </div>
        </div>
        HTML;
    }
}