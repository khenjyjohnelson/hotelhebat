<?php
// lang_helper.php

if (!function_exists('load_language_file')) {
    function load_language_file($preferred_lang, array $language_mapping, $default_lang = 'en') {
        $ci =& get_instance();
        
        // Load the appropriate language file
        if (array_key_exists($preferred_lang, $language_mapping)) {
            $folder = $language_mapping[$preferred_lang];
            $ci->lang->load($preferred_lang . '_lang', $folder);
        } else {
            // Default to the default language if no preference or invalid preference is found
            $ci->lang->load($default_lang . '_lang', $default_lang);
        }
    }
}
?>
