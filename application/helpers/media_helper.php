<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('truncateText')) {
    /**
     * Truncate text to a specified length.
     *
     * @param string $text The text to truncate.
     * @param int $maxLength The maximum length of the truncated text.
     * @param string $suffix (optional) The suffix to append if the text is truncated.
     * @return string The truncated text.
     */
    function truncateText($text, $maxLength, $suffix = '...') {
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

if ( ! function_exists('datetime_elapsed_string'))
{
    function datetime_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime();
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'tahun',
            'm' => 'bulan',
            'w' => 'minggu',
            'd' => 'hari',
            'h' => 'jam',
            'i' => 'menit',
            's' => 'detik',
        );

        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) {
            $string = array_slice($string, 0, 1);
        }

        return $string ? implode(', ', $string) . ' yang lalu' : 'Baru saja';
    }
}

if (!function_exists('getExtension')) {
    function getExtension($filePath) {
        return pathinfo($filePath, PATHINFO_EXTENSION);
    }
}

if (!function_exists('rename_file')) {
    /**
     * Rename a file
     *
     * @param string $old_path Old file path including the file name
     * @param string $new_name New file name without path
     * @return bool True on success, false on failure
     */
    function rename_file($old_path, $new_name) {
        // Get the directory path
        $dir = pathinfo($old_path, PATHINFO_DIRNAME);
        // Get the new file path
        $new_path = $dir . DIRECTORY_SEPARATOR . $new_name;

        // Rename the file
        return rename($old_path, $new_path);
    }
}