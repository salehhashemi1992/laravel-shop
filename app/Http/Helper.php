<?php

if (!function_exists('isActive')) {
    function isActive($route)
    {
        if (is_array($route)) {
            return in_array(\Illuminate\Support\Facades\Route::currentRouteName(), $route) ? 'active' : '';
        }
        return \Illuminate\Support\Facades\Route::currentRouteName() == $route ? 'active' : '';
    }

    function isStartsWith($route)
    {
        return str_starts_with(\Illuminate\Support\Facades\Route::currentRouteName(), $route) ? 'active' : '';
    }
}
