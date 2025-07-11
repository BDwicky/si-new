<?php
if (!function_exists('load_admin_sidebar')) {
    function load_admin_sidebar($data = []) {
        return view('templates/sidebar-admin', $data);
    }
}