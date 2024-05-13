<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('truncateText')) {
    /**
     * Truncate text to a specified length.
     *
     * @param string $text The text to truncate.
     * @param int $maxLength The maximum length of the truncated text.
     * @param string $suffix (optional) The suffix to append if the text is truncated.
     * @return string The truncated text.
     */
    function truncateText($text, $maxLength = 100, $suffix = '...') {
        if (strlen($text) <= $maxLength) {
            return $text;
        }

        $truncatedText = substr($text, 0, $maxLength);
        $lastSpacePos = strrpos($truncatedText, ' ');

        if ($lastSpacePos !== false) {
            $truncatedText = substr($truncatedText, 0, $lastSpacePos);
        }

        return $truncatedText . $suffix;
    }
}
