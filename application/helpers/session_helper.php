<?php
// session_helper.php

// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function to set session data
function set_userdata($key, $value) {
    $_SESSION[$key] = $value;
}

// Function to get session data
function userdata($key) {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
}

// Function to unset session data
function unset_userdata($key) {
    unset($_SESSION[$key]);
}

// Function to destroy the session
function destroy_session() {
    $_SESSION = array();
    session_destroy();
}

// Function to set flashdata
function set_flashdata($key, $value) {
    $_SESSION['flashdata'][$key] = $value;
}

// Function to get flashdata and then unset it
function get_flashdata($key) {
    if (isset($_SESSION['flashdata'][$key])) {
        $value = $_SESSION['flashdata'][$key];
        unset($_SESSION['flashdata'][$key]);
        return $value;
    }
    return null;
}

// Function to set tempdata
function set_tempdata($key, $value) {
    $_SESSION['tempdata'][$key] = $value;
}

// Function to get tempdata and then unset it
function get_tempdata($key) {
    if (isset($_SESSION['tempdata'][$key])) {
        $value = $_SESSION['tempdata'][$key];
        unset($_SESSION['tempdata'][$key]);
        return $value;
    }
    return null;
}
?>
