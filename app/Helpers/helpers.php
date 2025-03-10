<?php

use Illuminate\Support\Facades\Auth;


if (!function_exists('logged_user')) {
    function logged_user()
    {
        return Auth::user();
    }
}

if (!function_exists('logged_admin')) {
    function logged_admin()
    {
        return Auth::guard('admin')->user();
    }
}

if (!function_exists('is_admin')) {
    function is_admin()
    {
        return Auth::guard('admin')->check();
    }
}

if (!function_exists('is_user')) {
    function is_user()
    {
        return Auth::guard('web')->check();
    }
}

if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        return Auth::guard('web')->check() || Auth::guard('admin')->check();
    }
}