<?php

if (!function_exists('isActive')) {
    function isActive($route)
    {
        if (is_array($route)) {
            return in_array(\Illuminate\Support\Facades\Route::currentRouteName(), $route) ? 'active' : '';
        }
        return \Illuminate\Support\Facades\Route::currentRouteName() == $route ? 'active' : '';
    }
}
